<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use PDF; 

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all(); // Fetch all invoices from the database
        foreach ($invoices as $invoice) {
            $invoice->total_bayar = $invoice->invoiceItems()->sum('amount');
        }
        return view('invoices.index', ['invoices' => $invoices]);
    }

    public function store(Request $request)
    {
        // Validasi data dari formulir
        $request->validate([
            'nomorInvoice' => 'required',
            'orderNo' => 'required',
            'toAddress' => 'required',
            'shippingAddress' => 'required',
            'phone' => 'required',
            'tanggalPenerbitan' => 'required|date',
            'deskripsi.*' => 'required',
            'price.*' => 'required|numeric',
            'amount.*' => 'required|numeric',
        ], [
            'nomorInvoice.required' => 'Nomor Invoice harus diisi',
            'orderNo.required' => 'Order No harus diisi',
            'toAddress.required' => 'Nama Perusahaan Tujuan harus diisi',
            'shippingAddress.required' => 'Alamat Perusahaan harus diisi',
            'phone.required' => 'No Telepon harus diisi',
            'tanggalPenerbitan.required' => 'Tanggal Penerbitan harus diisi',
            'tanggalPenerbitan.date' => 'Tanggal Penerbitan harus dalam format tanggal yang valid',
            'deskripsi.*.required' => 'Deskripsi Item harus diisi',
            'price.*.required' => 'Harga harus diisi',
            'price.*.numeric' => 'Harga harus berupa angka',
            'amount.*.required' => 'Jumlah harus diisi',
            'amount.*.numeric' => 'Jumlah harus berupa angka',
        ]);

        // Simpan data invoice ke dalam database
        $invoice = new Invoice();
        $invoice->nomor_invoice = $request->input('nomorInvoice');
        $invoice->order_no = $request->input('orderNo');
        $invoice->nama_perusahaan_tujuan = $request->input('toAddress');
        $invoice->alamat_perusahaan = $request->input('shippingAddress');
        $invoice->no_telepon = $request->input('phone');
        $invoice->tanggal_penerbitan = $request->input('tanggalPenerbitan');
        $invoice->save();

        // Simpan data invoice items ke dalam database
        $deskripsi = $request->input('deskripsi');
        $prices = $request->input('price');
        $amounts = $request->input('amount');

        // Membersihkan nilai dari titik (.) dalam 'price' dan 'amount'
        foreach ($prices as $key => $price) {
            $prices[$key] = str_replace('.', '', $price);
        }

        foreach ($amounts as $key => $amount) {
            $amounts[$key] = str_replace('.', '', $amount);
        }

        // Pastikan data yang diterima adalah array
        if (is_array($deskripsi) && is_array($prices) && is_array($amounts)) {
            foreach ($deskripsi as $key => $item) {
                $invoiceItem = new InvoiceItem();
                $invoiceItem->invoice_id = $invoice->id;
                $invoiceItem->deskripsi = $item;
                $invoiceItem->unit_price = $prices[$key];
                $invoiceItem->amount = $amounts[$key];
                $invoiceItem->save();
            }
        } else {
            // Handle jika data tidak dalam bentuk array
            return redirect()->back()->with('error', 'Data item tidak valid');
        }

        return redirect()->back()->with('success', 'Invoice berhasil disimpan');
    }

    public function destroy(Invoice $invoice)
    {
        try {
            // Hapus terlebih dahulu semua item invoice yang terkait
            $invoice->invoiceItems()->delete();
            $invoice->delete();
    
            return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('invoices.index')->with('error', 'Failed to delete invoice');
        }
    }
    

    public function print($id)
    {
        // Fetch the invoice details by ID
        $invoice = Invoice::findOrFail($id);
    
        // Calculate the total payment for the invoice
        $invoice->total_bayar = $invoice->invoiceItems()->sum('amount');
    
        // Check if the invoice is found
        if (!$invoice) {
            return redirect()->route('invoices.index')->with('error', 'Invoice not found');
        }
    
        // Assuming you are using a PDF library to generate PDFs
        $pdf = PDF::loadView('invoices.print', ['invoice' => $invoice]);
    
        // Return the PDF for printing or download
        return $pdf->stream('invoice.pdf');
    }

    public function edit($id)
    {
        $invoice = Invoice::with('invoiceItems')->findOrFail($id);
        return view('invoices.edit', compact('invoice'));
    }

    // Metode untuk menangani permintaan update
    public function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        $request->validate([
            'nomor_invoice' => 'required',
            'order_no' => 'required',
            'nama_perusahaan_tujuan' => 'required',
            'alamat_perusahaan' => 'required',
            'no_telepon' => 'required',
            'tanggal_penerbitan' => 'required|date',
            'deskripsi.*' => 'required',
            'price.*' => 'required|numeric',
            'amount.*' => 'required|numeric',
        ], [
            'nomor_invoice.required' => 'Nomor Invoice harus diisi',
            'order_no.required' => 'Order No harus diisi',
            'nama_perusahaan_tujuan.required' => 'Nama Perusahaan Tujuan harus diisi',
            'alamat_perusahaan.required' => 'Alamat Perusahaan harus diisi',
            'no_telepon.required' => 'No Telepon harus diisi',
            'tanggal_penerbitan.required' => 'Tanggal Penerbitan harus diisi',
            'tanggal_penerbitan.date' => 'Tanggal Penerbitan harus dalam format tanggal yang valid',
            'deskripsi.*.required' => 'Deskripsi Item harus diisi',
            'price.*.required' => 'Harga harus diisi',
            'price.*.numeric' => 'Harga harus berupa angka',
            'amount.*.required' => 'Jumlah harus diisi',
            'amount.*.numeric' => 'Jumlah harus berupa angka',
        ]);

        // Temukan invoice yang akan diupdate
        $invoice = Invoice::findOrFail($id);

        // Perbarui data invoice
        $invoice->update([
            'nomor_invoice' => $request->nomor_invoice,
            'order_no' => $request->order_no,
            'nama_perusahaan_tujuan' => $request->nama_perusahaan_tujuan,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'no_telepon' => $request->no_telepon,
            'tanggal_penerbitan' => $request->tanggal_penerbitan
        ]);

        if ($request->filled('deskripsi')) {
            foreach ($request->deskripsi as $key => $deskripsi) {
                // Temukan atau buat invoice item terkait berdasarkan ID jika ada
                $invoiceItem = InvoiceItem::updateOrCreate(
                    ['id' => $request->item_id[$key] ?? null], // Cari berdasarkan ID, atau null jika tidak ada
                    [
                        'deskripsi' => $deskripsi,
                        'unit_price' => $request->price[$key] ?? 0,
                        'amount' => $request->amount[$key] ?? 0,
                        'invoice_id' => $invoice->id // Pastikan untuk menambahkan ID invoice yang sesuai
                    ]
                );
            }
        }

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully');
    }
}

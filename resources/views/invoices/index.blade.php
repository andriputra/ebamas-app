@extends('layouts.app')

@section('content')
<div class="dashboard">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input Invoice</div>
                <div class="card-body">
                    <form method="post" action="{{ route('store.invoice') }}">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="invoice" class="col-md-2 col-form-label text-md-right">Nomor Invoice</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="nomorInvoice" name="nomorInvoice">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="orderNo" class="col-md-2 col-form-label text-md-right">Order No</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="orderNo" name="orderNo">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="toAddress" class="col-md-2 col-form-label text-md-right">Nama Perusahaan Tujuan</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="toAddress" name="toAddress">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="shippingAddress" class="col-md-2 col-form-label text-md-right">Alamat Perusahaan</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="shippingAddress" name="shippingAddress" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="phone" class="col-md-2 col-form-label text-md-right">No Telepon</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tanggalPenerbitan" class="col-md-2 col-form-label text-md-right">Tanggal Penerbitan</label>
                            <div class="col-md-10">
                                <input type="date" class="form-control" id="tanggalPenerbitan" name="tanggalPenerbitan">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row mb-3">
                            <div class="col-md-2 col-form-label text-md-right"><b>Data Item</b></div>
                        </div>
                        <div class="form-group row mb-2">
                            <div class="col-md-12">
                                <div class="box-item row">
                                    <div class="table responsive">
                                        <table class="table table-striped" id="invoiceTable">
                                            <thead>
                                                <tr>
                                                    <th>Description</th>
                                                    <th>Unit Price</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="invoice-row">
                                                    <td><input type="text" class="form-control" name="deskripsi[]"></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rp.</span>
                                                            <input type="text" class="form-control price-currency" name="price[]" id="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rp.</span>
                                                            <input type="text" class="form-control price-currency" name="amount[]" id="amountRupiah">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger" type="button" onclick="removeRow(this)"><i class="fa-solid fa-trash-can"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="button" id="addInputBtn">Add Input</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                        <hr>
                        <div class="form-group row mb-0">
                            <div class="">
                                <button class="btn btn-secondary me-md-2" type="button">Cancel</button>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Riwayat Pembayaran</div>
                <div class="card-body">
                    <div class="table-pembayaran">
                        <table class="table table-striped">
                            <thead>
                                <tr> 
                                    <th>No</th>
                                    <th>No Invoice</th>
                                    <th>Tanggal Penerbitan</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Total Tagihan</th>
                                    <th style="width:15%; text-align: center;">Action</th>
                                </tr>
                            </thead>    
                            <tbody>
                                @foreach($invoices as $key => $invoice)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $invoice->nomor_invoice }}</td>
                                    <td>{{ $invoice->tanggal_penerbitan }}</td>
                                    <td>{{ $invoice->nama_perusahaan_tujuan }}</td>
                                    <td>Rp. {{ number_format($invoice->total_bayar, 0, ',', '.') }}</td>
                                    <td style="text-align: center;">
                                        <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>&nbsp; 
                                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                        </form>&nbsp;
                                        <a href="{{ route('invoices.print', $invoice->id) }}" target="_blank" class="btn btn-secondary"><i class="fa-solid fa-print"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        var tanpa_rupiah1 = document.getElementById('PriceRupiah');
        tanpa_rupiah1.addEventListener('keyup', function(e) {
            tanpa_rupiah1.value = formatRupiah(this.value);
        });

        var tanpa_rupiah2 = document.getElementById('AmountRupiah');
        tanpa_rupiah2.addEventListener('keyup', function(e) {
            tanpa_rupiah2.value = formatRupiah(this.value);
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    });
</script> -->
@endsection

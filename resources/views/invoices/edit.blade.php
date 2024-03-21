@extends('layouts.app')

@section('content')
<div class="dashboard">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update Invoice</div>
                <div class="card-body">
                    <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row mb-3">
                            <label for="invoice" class="col-md-2 col-form-label text-md-right">Nomor Invoice</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="nomorInvoice" name="nomor_invoice" value="{{ $invoice->nomor_invoice }}">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="orderNo" class="col-md-2 col-form-label text-md-right">Order No</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="orderNo" name="order_no" value="{{ $invoice->order_no }}">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="toAddress" class="col-md-2 col-form-label text-md-right">Nama Perusahaan Tujuan</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="toAddress" name="nama_perusahaan_tujuan" value="{{ $invoice->nama_perusahaan_tujuan }}">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="shippingAddress" class="col-md-2 col-form-label text-md-right">Alamat Perusahaan</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="shippingAddress" name="alamat_perusahaan" rows="3" value="{{ $invoice->alamat_perusahaan }}"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="phone" class="col-md-2 col-form-label text-md-right">No Telepon</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="phone" name="no_telepon" value="{{ $invoice->no_telepon }}">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tanggalPenerbitan" class="col-md-2 col-form-label text-md-right">Tanggal Penerbitan</label>
                            <div class="col-md-10">
                                <input type="date" class="form-control" id="tanggalPenerbitan" name="tanggal_penerbitan" value="{{ $invoice->tanggal_penerbitan }}">
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
                                                @foreach($invoice->invoiceItems as $key => $item)
                                                <tr class="invoice-row">
                                                    <td><input type="text" class="form-control" name="deskripsi[]" value="{{ $item->deskripsi }}"></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rp.</span>
                                                            <input type="text" class="form-control price-currency" name="price[]" value="{{ $item->unit_price }}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rp.</span>
                                                            <input type="text" class="form-control price-currency" name="amount[]" value="{{ $item->amount }}">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger" type="button" onclick="removeRow(this)"><i class="fa-solid fa-trash-can"></i></button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="button" id="addInputBtn">Add Input</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="action">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

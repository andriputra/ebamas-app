@extends('layouts.app')

@section('content')
<div class="dashboard">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Surat Jalan</div>
                <div class="card-body">
                    <form>
                        <div class="col-md-2"><strong>Pengirim</strong></div>
                        <div class="form-group row mb-3">
                            <label for="namaPengirim" class="col-md-2 col-form-label text-md-right">Nama</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="namaPengirim" name="namaPengirim">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="shippingorder" class="col-md-2 col-form-label text-md-right">Alamat Pengirim</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="shippingorder" rows="3"></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-2"><strong>Penerima</strong></div>
                        <div class="form-group row mb-3">
                            <label for="namaPenerima" class="col-md-2 col-form-label text-md-right">Nama</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="namaPenerima" name="namaPenerima">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="shippingrecieve" class="col-md-2 col-form-label text-md-right">Alamat Penerima</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="shippingrecieve" rows="3"></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row mb-3">
                            <label for="orderNo" class="col-md-2 col-form-label text-md-right">No PO</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="orderNo" name="orderNo">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tanggalPenerbitan" class="col-md-2 col-form-label text-md-right">Tanggal</label>
                            <div class="col-md-10">
                                <input type="date" class="form-control" id="Date" name="tanggalPenerbitan">
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
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama Barang</th>
                                                    <th>Qty</th>
                                                    <th>Keterangan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" class="form-control" id="namaBarang" name="namaBarang"></td>
                                                    <td><input type="number" class="form-control" id="nomor" name="nomor"></td>
                                                    <td><input type="text" class="form-control" id="info" name="info"></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="button" id="addInputBtn">Add Item</button>
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
                                    <th>No PO</th>
                                    <th>Tanggal</th>
                                    <th>Penerima</th>
                                    <th>Pengirim</th>
                                    <th style="width:7%">Action</th>
                                    <th style="width:7%">Cetak</th>
                                </tr>
                            </thead>    
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="#" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>&nbsp; 
                                        <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a> 
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-success"><i class="fa-solid fa-download"></i></a>&nbsp;
                                        <a href="#" class="btn btn-secondary"><i class="fa-solid fa-print"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addInputBtn = document.getElementById('addInputBtn');
        addInputBtn.addEventListener('click', function () {
            const tableBody = document.querySelector('#addInputBtn').closest('.box-item').querySelector('tbody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td><input type="text" class="form-control" name="deskripsi"></td>
                <td>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control" name="price">
                    </div>
                </td>
                <td>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" class="form-control" name="amount">
                    </div>
                </td>
                <td>
                    <button class="btn btn-danger" type="button" onclick="removeRow(this)"><i class="fa-solid fa-trash-can"></i></button>
                </td>
            `;
            tableBody.appendChild(newRow);
        });
        window.removeRow = function (button) {
            const row = button.closest('tr');
            row.remove();
        };
    });
</script>
@endsection

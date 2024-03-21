@extends('layouts.app')

@section('content')
<div class="dashboard">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Kwitansi</div>
                <div class="card-body">
                    <form>
                        <div class="form-group row mb-3">
                            <label for="nomorKwitansi" class="col-md-2 col-form-label text-md-right">Nomor</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="nomorKwitansi" name="nomorKwitansi">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="penerima" class="col-md-2 col-form-label text-md-right">Terima Dari</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="penerima" name="penerima">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="jumlahuang" class="col-md-2 col-form-label text-md-right">Uang Sejumlah</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="jumlahuang" name="jumlahuang">
                                <p class="textUang" id="TerbilangUang"></p>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="pembayaran" class="col-md-2 col-form-label text-md-right">Untuk Pembayaran</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="pembayaran" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="noInvoice" class="col-md-2 col-form-label text-md-right">No Invoice</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="noInvoice" name="noInvoice">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tanggalPenerbitan" class="col-md-2 col-form-label text-md-right">Tanggal</label>
                            <div class="col-md-10">
                                <input type="date" class="form-control" id="Date" name="tanggalPenerbitan">
                            </div>
                        </div>                              
                        <hr>
                        <div class="form-group row mb-0 offset-md-2">
                            <div class="action">
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
                <div class="card-header">Daftar Kwitansi Yang di Input</div>
                <div class="card-body">
                    <div class="table-pembayaran">
                        <table class="table table-striped">
                            <thead>
                                <tr> 
                                    <th>No</th>
                                    <th>No Kwitansi</th>
                                    <th>No Invoice</th>
                                    <th>Penerima</th>
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

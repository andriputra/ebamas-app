@extends('layouts.app')

@section('content')
<div class="dashboard">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Form Perpajakan</div>
                <div class="card-body">
                    <form>
                        <div class="form-group row mb-3">
                            <label for="namaWajibPajak" class="col-md-2 col-form-label text-md-right">Nama Wajib Pajak</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="namaWajibPajak" name="namaWajibPajak">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="npwp" class="col-md-2 col-form-label text-md-right">NPWP</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="npwp" name="npwp">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="alamat" class="col-md-2 col-form-label text-md-right">Alamat</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="alamat" rows="3" name="alamat"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="jumlahPendapatan" class="col-md-2 col-form-label text-md-right">Jumlah Pendapatan</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="jumlahPendapatan" name="jumlahPendapatan">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="pajakYangDibayar" class="col-md-2 col-form-label text-md-right">Pajak yang Dibayar</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="pajakYangDibayar" name="pajakYangDibayar">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tanggalBayar" class="col-md-2 col-form-label text-md-right">Tanggal Pembayaran</label>
                            <div class="col-md-10">
                                <input type="date" class="form-control" id="tanggalBayar" name="tanggalBayar">
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
                <div class="card-header">Data Perpajakan</div>
                <div class="card-body">
                    <div class="table-perpajakan">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Wajib Pajak</th>
                                    <th>NPWP</th>
                                    <th>Alamat</th>
                                    <th>Jumlah Pendapatan</th>
                                    <th>Pajak yang Dibayar</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th style="width:7%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="#" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>&nbsp;
                                        <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
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
@endsection

<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="dashboard">
        <div class="row mb-4">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <p>Cash Flow Bulanan</p>
                        <a href="#" class="action"><i class="fa-solid fa-print"></i></a>
                    </div>
                    <div class="card-body">
                        <canvas id="cashflowChart" width="800" height="400" class="chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <p>Penjualan Terhutang</p>
                        <a href="#" class="action"><i class="fa-solid fa-print"></i></a>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart" width="800" height="400" class="chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <p>Tagihan Belum Dibayar</p>
                        <a href="#" class="action"><i class="fa-solid fa-print"></i></a>
                    </div>
                    <div class="card-body">
                        <canvas id="barChartTagihan" width="800" height="400" class="chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-6">
            <div class="card">
                    <div class="card-header">
                        <p>Laba Rugi</p>
                        <a href="#" class="action"><i class="fa-solid fa-print"></i></a>
                    </div>
                    <div class="card-body">
                        <canvas id="Labachart" width="800" height="400" class="chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components/CashFlowChart')
    @include('components/PenjualanTerhutang')
    @include('components/TagihanBelumDibayar')
    @include('components/LabaRugiChart')
@endsection

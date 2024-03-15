<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::post('/transactions', [TransactionController::class, 'store']);
    Route::get('/accounts', [AccountController::class, 'index']);
    Route::post('/accounts', [AccountController::class, 'store']);
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/master-data', [App\Http\Controllers\MasterController::class, 'index'])->name('master');
    Route::get('/invoice', [App\Http\Controllers\InvoiceController::class, 'index'])->name('invoice');
    Route::get('/surat-jalan', [App\Http\Controllers\SuratJalanController::class, 'index'])->name('surat-jalan');
    Route::get('/pajak', [App\Http\Controllers\PajakController::class, 'index'])->name('pajak');
    Route::get('/kwitansi', [App\Http\Controllers\KwitansiController::class, 'index'])->name('kwitansi');
});

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

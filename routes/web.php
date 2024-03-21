<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;

Route::middleware(['auth'])->group(function () {
    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::post('/transactions', [TransactionController::class, 'store']);
    Route::get('/accounts', [AccountController::class, 'index']);
    Route::post('/accounts', [AccountController::class, 'store']);
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pengaturan', [App\Http\Controllers\SettingController::class, 'index'])->name('seting');
    Route::get('/surat-jalan', [App\Http\Controllers\SuratJalanController::class, 'index'])->name('surat-jalan');
    Route::get('/pajak', [App\Http\Controllers\PajakController::class, 'index'])->name('pajak');
    Route::get('/kwitansi', [App\Http\Controllers\KwitansiController::class, 'index'])->name('kwitansi');

    //settingsroutes
    Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::put('/settings/update', [SettingsController::class, 'update'])->name('settings.update');

    //Invoice
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::post('/store-invoice', [InvoiceController::class, 'store'])->name('store.invoice');
    Route::get('/invoices/{id}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');
    Route::put('/invoices/{id}', [InvoiceController::class, 'update'])->name('invoices.update');
    Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
    Route::get('/invoices/{invoice}/download', [InvoiceController::class, 'download'])->name('invoices.download');
    Route::get('/invoices/{id}/print', [InvoiceController::class, 'print'])->name('invoices.print');
});

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

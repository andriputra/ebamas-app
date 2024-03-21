<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', // Tambahkan kolom 'id' ke dalam fillable
        // Daftar kolom lain yang diizinkan untuk diisi secara massal
        'deskripsi',
        'unit_price',
        'amount',
        // Kolom lainnya
    ];
}

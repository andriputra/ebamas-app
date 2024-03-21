<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_invoice',
        'order_no',
        'nama_perusahaan_tujuan',
        'alamat_perusahaan',
        'no_telepon',
        'tanggal_penerbitan'
    ];

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}

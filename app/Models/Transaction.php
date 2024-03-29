<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['description', 'amount', 'account_id'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}

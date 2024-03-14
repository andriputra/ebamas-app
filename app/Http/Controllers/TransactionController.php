<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // TransactionController.php
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions', compact('transactions'));
    }

    public function store(Request $request)
    {
        $transaction = new Transaction();
        $transaction->description = $request->input('description');
        $transaction->amount = $request->input('amount');
        // ... assign other fields
        $transaction->save();
        return redirect('/transactions');
    }

}

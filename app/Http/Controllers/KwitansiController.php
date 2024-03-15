<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KwitansiController extends Controller
{
    public function index()
    {
        return view('kwitansi');
    }
}

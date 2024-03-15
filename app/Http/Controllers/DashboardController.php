<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashFlow;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // Get cash flow data
    //    $cashFlows = CashFlow::orderBy('date')->get();
    //    $labels = $cashFlows->pluck('date');
    //    $data = $cashFlows->pluck('amount');

       // Return dashboard view with cash flow data
       return view('dashboard');
    }
}

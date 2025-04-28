<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Show the sales manager dashboard.
     */
    public function manager_dashboard(){
        return view('sales.manager.dashboard');
    }
}

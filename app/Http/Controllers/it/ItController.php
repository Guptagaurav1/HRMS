<?php

namespace App\Http\Controllers\it;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItController extends Controller
{
    /**
     * Show IT Head Dashboard
     */
    public function dashboard(){
       
        return view('it.dashboard');
    }
}

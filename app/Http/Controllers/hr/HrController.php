<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HrController extends Controller
{
    /**
     * Show HR Dashboard.
    */
    public function dashboard(Request $request){
        
        return view("hr.dashboard");
    }

}

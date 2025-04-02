<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    //
    public function index(){
        $data ='';
        return view("hr.leaves.emp-leaves",compact('data'));
    }
}

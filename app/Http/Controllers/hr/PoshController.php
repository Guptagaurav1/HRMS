<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PoshComplaint;

class PoshController extends Controller
{
    /**
     * Show Posh Complaints.
     */
    public function complaint_list(){
        $complaints = PoshComplaint::select('id', 'emp_id', 'subject', 'description')->paginate(25);
        return view("hr.posh.posh-complaint-list", compact('complaints'));
    }
}

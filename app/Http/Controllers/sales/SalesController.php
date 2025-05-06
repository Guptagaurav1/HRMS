<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeadAssignUser;

class SalesController extends Controller
{
    /**
     * Show the sales manager dashboard.
     */
    public function manager_dashboard()
    {
        $total_leads = LeadAssignUser::where('assigned_user_id', auth()->user()->id)->where('follow_up_status', 'enabled')->count();
        return view('sales.manager.dashboard', compact('total_leads'));
    }
}

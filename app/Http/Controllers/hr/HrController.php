<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PositionRequest;



class HrController extends Controller
{
    /**
     * Show HR Dashboard.
    */
    public function dashboard(Request $request){
        
        return view("hr.dashboard.hr-dashboard");
    }

    public function hr_operation_dashboard(){
        // to get current user
        $user = auth()->user();
        // count of position request by current user
        $countPositions = PositionRequest::select('created_by')
                            ->where('created_by',$user->id)        
                            ->count();
        return view("hr.dashboard.hr-operation-dashboard",compact('countPositions'));
    }

}

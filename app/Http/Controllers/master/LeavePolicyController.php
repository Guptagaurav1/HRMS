<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeavePolicy;
use Throwable;

class LeavePolicyController extends Controller
{
    /**
     * Show the listing of Leave policies.
     */
    public function index(Request $request)
    {
        $leavePolicies = LeavePolicy::select('id', 'casual_leave', 'paid_leave', 'per_month_leave', 'leave_carry_forward', 'duration', 'period', 'status');
        $search = '';
        if ($request->search)
        {
            $search = $request->search;
            $leavePolicies = $leavePolicies->where('casual_leave', 'LIKE', '%'. $search. '%')
                ->orWhere('paid_leave', 'LIKE', '%'. $search. '%')
                ->orWhere('per_month_leave', 'LIKE', '%'. $search. '%')
                ->orWhere('leave_carry_forward', 'LIKE', '%'. $search. '%')
                ->orWhere('duration', 'LIKE', '%'. $search. '%')
                ->orWhere('period', 'LIKE', '%'. $search. '%');
        }
        $leavePolicies = $leavePolicies->orderBy('id')->paginate(25)->withQueryString();

        return view('hr.master.leave_policies.index', compact('leavePolicies', 'search'));
    }


    /**
     * Edit Leave Policy.   
     */
    public function edit(Request $request)
    {
        try {
            $data = LeavePolicy::select('casual_leave', 'paid_leave', 'per_month_leave', 'leave_carry_forward', 'duration', 'period')->findOrFail($request->leave_id);
            return response()->json(['success' => true, 'data' => $data]);
        } catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => 'Invalid Request']);
        }
    }


    /**
     * Update the Leave Policy.
     */
    public function update(Request $request)
    {
        try {
            // Validate the request.
            $this->validate($request, [
                'period' => ['required'],
                'duration' => ['required'],
                'casual_leave' => ['required'],
                'paid_leave' => ['required', 'integer'],
                'per_month_leave' => ['required', 'integer'],
                'leave_carry_forward' => ['required'],
            ]);

            $data = $request->all();
            unset($data['_token']);
            unset($data['leave_id']);
            // Update Leave Policy.
            $leave = LeavePolicy::findOrFail($request->leave_id);
            $leave->update($data);

            return response()->json(['success' => true, 'message' => 'Leave policy updated successfully.']);
        } catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Deactivate the Holiday.
     */
    public function deactive(Request $request)
    {
        try {
            $leave = LeavePolicy::findOrFail($request->leave_id);
            $leave->status = '0';
            $leave->save();
            return response()->json(['success' => true, 'message' => 'Leave policy deactivated successfully.']);
        } catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => 'Invalid Request']);
        }
    }

    /**
     * Activate the Holiday.
     */
    public function active(Request $request)
    {
        try {
            $leave = LeavePolicy::findOrFail($request->leave_id);
            $leave->status = '1';
            $leave->save();
            return response()->json(['success' => true, 'message' => 'Leave policy activated successfully.']);
        } catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => 'Invalid Request']);
        }
    }
}

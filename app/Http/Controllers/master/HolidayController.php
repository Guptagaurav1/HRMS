<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Holiday;
use Throwable;
use Illuminate\Validation\Rule;

class HolidayController extends Controller
{
    /**
     * Show Holidays
     */
    public function index(Request $request)
    {
        $holidays = Holiday::select('id', 'holiday_name', 'holiday_date', 'holiday_type', 'status');
        $search = '';
        if ($request->search)
        {
            $search = $request->search;
            $holidays = $holidays->where('holiday_name', 'LIKE', '%'. $search. '%')
                ->orWhere('holiday_type', 'LIKE', '%'. $search. '%');
        }
        $holidays = $holidays->orderBy('id')->paginate(25)->withQueryString();
        return view('hr.master.holiday.index', compact('holidays', 'search'));
    }

    /**
     * Save the Holiday.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request.
            $this->validate($request, [
                'holiday_name' => [
                    'required',
                    Rule::unique('holidays')->where(
                        fn($query) =>
                        $query->where('holiday_date', $request->holiday_date)
                            ->where('holiday_type', $request->holiday_type)
                    )
                ],
                'holiday_date' => ['required'],
                'holiday_type' => ['required'],
            ]);

            // Create a new holiday.
            Holiday::create($request->all());

            return response()->json(['success' => true, 'message' => 'Holiday added successfully.']);
        } catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Edit holidays.   
     */
    public function edit(Request $request)
    {
        try {
            $data = Holiday::select('holiday_name', 'holiday_date', 'holiday_type')->findOrFail($request->holiday_id);
            return response()->json(['success' => true, 'data' => $data]);
        } catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => 'Invalid Request']);
        }
    }

    /**
     * Update the Holiday.
     */
    public function update(Request $request)
    {
        try {
            // Validate the request.
            $this->validate($request, [
                'holiday_name' => [
                    'required',
                    Rule::unique('holidays')->where(
                        fn($query) =>
                        $query->where('holiday_date', $request->holiday_date)
                            ->where('holiday_type', $request->holiday_type)
                            ->where('id', '!=', $request->holiday_id)
                    )
                ],
                'holiday_date' => ['required'],
                'holiday_type' => ['required'],
                'holiday_id' => ['required', 'integer'],
            ]);

            $data = $request->all();
            unset($data['_token']);
            unset($data['holiday_id']);
            // Update holiday.
            $holiday = Holiday::findOrFail($request->holiday_id);
            $holiday->update($data);

            return response()->json(['success' => true, 'message' => 'Holiday updated successfully.']);
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
            $holiday = Holiday::findOrFail($request->holiday_id);
            $holiday->status = '0';
            $holiday->save();
            return response()->json(['success' => true, 'message' => 'Holiday deactivated successfully.']);
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
            $holiday = Holiday::findOrFail($request->holiday_id);
            $holiday->status = '1';
            $holiday->save();
            return response()->json(['success' => true, 'message' => 'Holiday activated successfully.']);
        } catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => 'Invalid Request']);
        }
    }

}

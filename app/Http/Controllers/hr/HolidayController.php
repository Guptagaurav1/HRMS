<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the holiday.
     */
    public function index(Request $request)
    {
        $holidays = Holiday::select('holiday_name', 'holiday_date', 'holiday_type')->where('status', '1');
        $search = '';
        if ($request->search) {
            $search = $request->search;
            $holidays = $holidays->whereAny([
                'holiday_name',
                'holiday_date',
                'holiday_type'
            ], 'LIKE', '%'.$request->search.'%');
        }
        $holidays = $holidays->paginate(10);

        return view("hr.holiday-list", compact('holidays', 'search'));
    }

    /**
     * Show the form for creating a new holiday.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created holiday in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified holiday.
     */
    public function show(Holiday $holiday)
    {
        //
    }

    /**
     * Show the form for editing the specified holiday.
     */
    public function edit(Holiday $holiday)
    {
        //
    }

    /**
     * Update the specified holiday in storage.
     */
    public function update(Request $request, Holiday $holiday)
    {
        //
    }

    /**
     * Remove the specified holiday from storage.
     */
    public function destroy(Holiday $holiday)
    {
        //
    }
}

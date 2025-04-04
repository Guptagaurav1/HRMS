<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\empDetail;
use App\Models\EmpLeave;
use App\Models\LeaveRequest;
use App\Models\Month;
use Carbon\Carbon;

class StoreEmployeeLeave extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'employee:store-leave';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store leave for active employees';
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $currentMonth = now()->month; 
        $currentYear = now()->year;

        $employees = empDetail::where([
            ['emp_current_working_status', '=', 'Active'],
            ['emp_work_order', '=', 'PSSPL Internal Employees']
        ])->get();

        foreach ($employees as $employee) {
            $empCode = $employee->emp_code;
            $this->store_leave($empCode, $currentMonth, $currentYear);
        }

        $this->info('Employee leave stored successfully!');
    }

    
    // get old employee details
    public function is_oldemployee($empcode)
    {
        // Fetch employee data using Eloquent
        $employee = EmpDetail::where('emp_code', $empcode)->first();

        if ($employee) {
            $doj = Carbon::parse($employee->emp_doj); // Date of Joining
            $currentDate = Carbon::now();

            // Calculate the difference in years
            $yearsSpent = $doj->diffInYears($currentDate);

            return $yearsSpent > 0;
        }

        return false;
    }

    
    public function get_total_cl($empcode)
    {
        // Fetch employee data using Eloquent
        $employee = EmpDetail::where('emp_code', $empcode)->first();

        if ($employee) {
            $doj = Carbon::parse($employee->emp_doj); // Date of Joining
            $currentDate = Carbon::now();

            $joiningYear = $doj->year;
            $joiningMonth = $doj->month;
            $currentYear = $currentDate->year;
            $currentMonth = $currentDate->month;

            $totalMonthsInYear = 12;

            if ($currentYear > $joiningYear) {
                return $totalMonthsInYear; // Full year passed
            } else {
                return $currentMonth - $joiningMonth; // Months passed in the same year
            }
        }

        return 0; // If employee not found
    }
    
    
    // get total pl employee 
    public function get_total_pl($empcode)
    {
        $employee = EmpDetail::where('emp_code', $empcode)->first();

        if (!$employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }

        $doj = Carbon::parse($employee->emp_doj); // Date of Joining
        $currentDate = Carbon::now();

        $interval = $doj->diff($currentDate);
        $yearsSpent = $interval->y;
        $monthsSpent = $interval->m;
        $daysSpent = $interval->d;

        if ($yearsSpent > 0) {
            $doj->addYear(); // Add 1 year to the DOJ
            $interval = $doj->diff($currentDate);

            $getMonths = $interval->m;
            $getYears = $interval->y;
            $getDays = $interval->d;

            $months = ($getYears * 12) + $getMonths + ($getDays > 0 ? 1 : 0); // Adding 1 if days are present

            return $months * 1.25; // For 1 month, 1.25 leave is given
        } else {
            return 0; // No leave accrued yet
        }
    }
    
    //get absent details 
    public function get_absent_days($empcode, $month, $year)
    {
        // Full Day Leaves
        $approvedLeaves = LeaveRequest::where([
            ['emp_code', '=', $empcode],
            ['status', '=', 'Approved'],
            ['reason_for_absence', '<>', 'Half Day leave']
        ])->whereYear('created_at', $year)->get();

        $days = [];
        foreach ($approvedLeaves as $leave) {
            $absenceDates = explode(",", $leave->absence_dates);
            foreach ($absenceDates as $date) {
                if (Carbon::parse($date)->month == $month) {
                    $days[] = $date;
                }
            }
        }

        // Half Day Leaves
        $halfDayLeaves = LeaveRequest::where([
            ['emp_code', '=', $empcode],
            ['status', '=', 'Approved'],
            ['reason_for_absence', '=', 'Half Day leave']
        ])->whereYear('created_at', $year)->get();

        $halfDays = [];
        foreach ($halfDayLeaves as $leave) {
            $absenceDates = explode(",", $leave->absence_dates);
            foreach ($absenceDates as $date) {
                if (Carbon::parse($date)->month == $month) {
                    $halfDays[] = $date;
                }
            }
        }

        $halfDayLeavesCount = count($halfDays) / 2;

        return count($days) + $halfDayLeavesCount;
    }
    

    public function get_carryforward_cl($empcode, $month, $year)
    {
        if ($month == 1) {
            return 0; // No carry forward for January
        } else {
            $previous_month_id = $month - 1;

            $previousRecord = EmpLeave::where([
                ['emp_code', '=', $empcode],
                ['month_id', '=', $previous_month_id],
                ['year', '=', $year]
            ])->first();

            if ($previousRecord) {
                if ($previousRecord->leave_taken >= 1) {
                    $left_cl = $previousRecord->carry_forward_cl + $previousRecord->casual_leave - $previousRecord->leave_taken;
                    return $left_cl < 0 ? 0 : $left_cl;
                } else {
                    return $previousRecord->carry_forward_cl + $previousRecord->casual_leave;
                }
            } else {
                return 0; // No record found
            }
        }
    }


    // get carry forwards leaves
    public function get_carryforward_pl($empcode, $month, $year)
    {
        if ($this->is_oldemployee($empcode)) {
            $previous_month_id = $month - 1;

            $lastMonthRecord = EmpLeave::where([
                ['emp_code', '=', $empcode],
                ['month_id', '=', $previous_month_id],
                ['year', '=', $year]
            ])->first();

            if ($lastMonthRecord) {
                $total_cl = $lastMonthRecord->casual_leave + $lastMonthRecord->carry_forward_cl;
                $total_pl = $lastMonthRecord->privilege_leave + $lastMonthRecord->carry_forward_pl;

                if ($lastMonthRecord->leave_taken > $total_cl) {
                    $leaves_left = $lastMonthRecord->leave_taken - $total_cl;
                    $pl_left = $total_pl - $leaves_left;

                    return $pl_left < 0 ? 0 : $pl_left;
                } else {
                    return $total_pl;
                }
            }
        }

        return 0; // Default return if not an old employee or no record found
    }

    // monthly leave alloted
    public function alloted_monthly_cl($empcode){
		return 1;
	}
     
    // alloted monthly pl
    public function alloted_monthly_pl($empcode){
        if($this->is_oldemployee($empcode)){
            return 1.25; 
        }
      return 0;
    }
    
    // get month
    public function get_month($monthid){
		// $sql = "SELECT month FROM months WHERE id = '$monthid'";
		$sql =Months::where('id',$monthid);
		$record = mysqli_query($this->class->conn, $sql);
		if ($record && $record->num_rows > 0) {
			$month = $record->fetch_assoc();
			return $month['month'];
		}
		return '';
	}

    // get exist leaves
    public function leaves_exist($empcode, $year){
        $exists = LeaveRequest::where('emp_code', $empcode)
        ->whereYear('created_on', $year)
        ->exists();

        return $exists;
	}
    
    // get month leaves
    public function last_month_leave($empcode, $year)
    {
        $records = LeaveRequest::where('emp_code', $empcode)
            ->whereYear('created_on', $year)
            ->get();

        if ($records->isNotEmpty()) {
            $months = [];

            foreach ($records as $leave) {
                $absenceDates = explode(",", $leave->absence_dates);

                foreach ($absenceDates as $date) {
                    $months[] = Carbon::parse($date)->month;
                }
            }

            $lastMonth = max(array_unique($months));

            return $lastMonth;
        }

        return false; // No records found
    }


    // store leaves methode here
    public function store_leave($empcode, $currentmonth, $currentyear)
    {
     
        $employee = EmpDetail::where('emp_code', $empcode)->first();
        if (!$employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }

        $casualleave = $this->alloted_monthly_cl($empcode);
        $privilegeleave = $this->alloted_monthly_pl($empcode);
        $leavetaken = $this->get_absent_days($empcode, $currentmonth, $currentyear);
        $carry_forward_cl = $this->get_carryforward_cl($empcode, $currentmonth, $currentyear);
        $carry_forward_pl = $this->get_carryforward_pl($empcode, $currentmonth, $currentyear);
        // dd($carry_forward_pl);
        // dd($carry_forward_pl);
        // Check if record exists
        $existingLeave = EmpLeave::where([
            ['emp_code', '=', $empcode],
            ['month_id', '=', $currentmonth],
            ['year', '=', $currentyear]
        ])->first();
            
        if ($existingLeave) {
            // Update existing record
            $previous_monthid = $currentmonth - 1;
            if ($previous_monthid > 0) {
                $previousRecord = EmpLeave::where([
                    ['emp_code', '=', $empcode],
                    ['month_id', '=', $previous_monthid],
                    ['year', '=', $currentyear]
                ])->first();

                if ($previousRecord) {
                    $previous_leavetaken = $this->get_absent_days($empcode, $previous_monthid, $currentyear);
                    $previousRecord->update([
                        'leave_taken' => $previous_leavetaken
                    ]);
                }
            }

            $updated_forward_cl = $this->get_carryforward_cl($empcode, $currentmonth, $currentyear);
            $updated_forward_pl = $this->get_carryforward_pl($empcode, $currentmonth, $currentyear);

            $existingLeave->update([
                'carry_forward_cl' => $updated_forward_cl,
                'carry_forward_pl' => $updated_forward_pl,
                'leave_taken' => $leavetaken
            ]);
        } else {
            // Insert new record
            if ($currentmonth == 1 && $currentyear == 2025) {
                $carry_forward_pl = $this->is_oldemployee($empcode) ? 10 : 0;
            }

            EmpLeave::create([
                'emp_code' => $empcode,
                'month_id' => $currentmonth,
                'year' => $currentyear,
                'casual_leave' => $casualleave,
                'privilege_leave' => $privilegeleave,
                'carry_forward_cl' => $carry_forward_cl,
                'carry_forward_pl' => $carry_forward_pl,
                'leave_taken' => $leavetaken
            ]);
        }

        return response()->json(['success' => 'Leave stored successfully']);
    }



}

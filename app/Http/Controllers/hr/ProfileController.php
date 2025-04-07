<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\EmpChangedColumnsReq;
use App\Models\EmpProfileRequestLog;
use App\Models\Notification;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use stdClass;
use Throwable;


class ProfileController extends Controller
{
    /**
     * Show admin profile page.
     */
    public function profile()
    {
        return view('hr.profile.admin-user-profile');
    }
}

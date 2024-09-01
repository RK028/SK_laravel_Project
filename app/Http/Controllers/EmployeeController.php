<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttendanceRecord;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function dashboard()
    {
        $attendanceRecords = Auth::user()->attendanceRecords()->orderBy('date', 'desc')->get();
        return view('pages.users.dashboard', compact('attendanceRecords'));
    }

    // Other methods if needed
}

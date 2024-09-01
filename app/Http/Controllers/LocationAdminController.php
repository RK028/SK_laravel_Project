<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LocationAdminController extends Controller
{
    public function dashboard()
    {
        $locationId = Auth::user()->location_id;
        $employees = User::where('location_id', $locationId)->whereHas('role', function($q){
            $q->where('name', 'Employee');
        })->get();

        return view('pages.location_admin.dashboard', compact('employees'));
    }
    public function showEmployeeAttendance($employeeId)
    {
    $employee = User::with('attendanceRecords')->findOrFail($employeeId);

    $attendanceRecords = $employee->attendanceRecords;

    return view('pages.location_admin.employee_attendance', compact('employee', 'attendanceRecords'));
    }


}

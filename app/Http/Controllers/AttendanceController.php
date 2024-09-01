<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttendanceRecord;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function clockIn()
    {
        $today = Carbon::today();

        $attendance = AttendanceRecord::firstOrCreate(
            ['user_id' => Auth::id(), 'date' => $today],
            ['clock_in_time' => Carbon::now()]
        );

        if (!$attendance->wasRecentlyCreated && $attendance->clock_in_time) {
            return redirect()->back()->with('error', 'You have already clocked in today.');
        }

        return redirect()->back()->with('success', 'Clocked in successfully.');
    }

    public function clockOut()
    {
        $today = Carbon::today();

        $attendance = AttendanceRecord::where('user_id', Auth::id())->where('date', $today)->first();

        if (!$attendance || $attendance->clock_out_time) {
            return redirect()->back()->with('error', 'You have not clocked in yet or already clocked out.');
        }

        $attendance->update(['clock_out_time' => Carbon::now()]);

        return redirect()->back()->with('success', 'Clocked out successfully.');
    }
}

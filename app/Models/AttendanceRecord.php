<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AttendanceRecord extends Model
{
    protected $fillable = [
        'user_id', 'date', 'clock_in_time', 'clock_out_time',
    ];

    protected $dates = [
        'date', 'clock_in_time', 'clock_out_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

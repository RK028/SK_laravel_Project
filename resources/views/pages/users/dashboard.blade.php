@extends('layout.master')

@section('title')
    Create Designation
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <h5 class="card-header">Employee Dashboard</h5>
           
   <div class="col m-4">
   <form action="{{ route('employee.clock_in') }}" method="POST" style="display: inline-block;">
        @csrf
        <button type="submit" class="btn btn-success">Clock In</button>
    </form>

    <form action="{{ route('employee.clock_out') }}" method="POST" style="display: inline-block;">
        @csrf
        <button type="submit" class="btn btn-danger">Clock Out</button>
    </form>
   </div>

   <h5 class="card-header">Your Attendance Records</h5>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Clock In Time</th>
                <th>Clock Out Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendanceRecords as $record)
            <tr>          

            <td>{{ Carbon\Carbon::parse($record->date)->toDateString() }}</td>
            <td>{{ $record->clock_in_time ? Carbon\Carbon::parse($record->clock_in_time)->format('H:i:s') : 'N/A' }}</td>
            <td>{{ $record->clock_out_time ? Carbon\Carbon::parse($record->clock_out_time)->format('H:i:s') : 'N/A' }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
@endsection



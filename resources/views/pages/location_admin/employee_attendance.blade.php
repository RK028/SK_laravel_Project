@extends('layout.master')

@section('title')
    Employes Details
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <h5 class="card-header">Employee Details</h5>
            <div class="col ms-3">
            <a href="{{ route('location_admin.dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
            </div>
                        <h5 class="card-header">Attendance Records for {{ $employee->name }}</h5>

            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Clock In</th>
                        <th>Clock Out</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendanceRecords as $record)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($record->date)->toDateString() }}</td>
                        <td>{{ $record->clock_in_time ? \Carbon\Carbon::parse($record->clock_in_time)->format('H:i:s') : 'N/A' }}</td>
                        <td>{{ $record->clock_out_time ? \Carbon\Carbon::parse($record->clock_out_time)->format('H:i:s') : 'N/A' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            
        </div>
    </div>
@endsection

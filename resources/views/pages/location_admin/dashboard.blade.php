@extends('layout.master')

@section('title')
    Create Designation
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <h5 class="card-header">Location Admin Dashboard</h5>
            <h5 class="card-header">Employees at {{ Auth::user()->location->name }}</h5>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Attendance Records</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td><a href="{{ route('location_admin.showEmployeeAttendance', $employee->id) }}">View Attendance</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
@endsection



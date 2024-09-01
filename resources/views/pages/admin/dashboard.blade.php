@extends('layout.master')

@section('title')
    Designation
@endsection

@section('content')
<style>
    table, th, td {
     
      border-collapse: collapse;
      font-weight:bold;
      font-size:14px;
      text-align:center;
      padding:10px;
    }
    
    </style>
    <!-- <h1>Admin Dashboard</h1> -->
   
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->
        <div class=" mb-2">
            <div class="d-block m-1" style="text-align: right">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Create New User</a>            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Admin Dashboard</h5>
            @if (session()->has('message'))
            <div id="alertMessage" class="alert alert-success" style="display: none;">
                {{ session('message') }}
            </div>
            @endif
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                // Function to display the alert after 2 seconds
                $(document).ready(function() {
                    // Show the alert with fade-in effect
                    $('#alertMessage').fadeIn();
        
                    // Fade out the alert after 2 seconds
                    setTimeout(function(){
                        $('#alertMessage').fadeOut();
                    }, 2000); // 2000 milliseconds = 2 seconds
                });
            </script>
            <div class="table-responsive text-nowrap">
                <table class="table">
                <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Location</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->location->name ?? 'N/A' }}</td>
                </tr>
                @endforeach
            </tbody>
                </table>
                <!-- <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location)
            <tr>
                <td>{{ $location->name }}</td>
                <td>{{ $location->address }}</td>
            </tr>
            @endforeach
        </tbody>
    </table> -->
                
            </div>
        </div>
       
    </div>
@endsection

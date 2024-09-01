@extends('layout.master')

@section('title')
    Create User
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
        <div class="card mb-4">
            <h5 class="card-header">Create User</h5>
            <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <!-- Name Field -->
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <!-- Email Field -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <!-- Password Field -->
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <!-- Role Dropdown -->
        <div class="form-group">
            <label for="role">Role:</label>
            <select class="form-control" id="role" name="role_id" required>
                <option value="" disabled selected>Select a Role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Location Dropdown -->
        <div class="form-group">
            <label for="location">Location:</label>
            <select class="form-control" id="location" name="location_id" required>
                <option value="" disabled selected>Select a Location</option>
                @foreach($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary m-4">Create User</button>
    </form>
        </div>
        </div>
        
    </div>
@endsection

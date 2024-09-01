<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LocationAdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;

// Display the login form
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// Handle the login request
Route::post('login', [LoginController::class, 'login']);
Route::post('Register', [RegisterController::class, 'register']);
// Handle the logout request
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// Public routes
Route::get('/', function () {
    return view('register');
});

Auth::routes();

// Admin routes
Route::group(['middleware' => ['auth', 'role:Admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');    // Other admin routes...
});

// Location Admin routes
Route::group(['middleware' => ['auth', 'role:Location Admin'], 'prefix' => 'location-admin', 'as' => 'location_admin.'], function () {
    Route::get('/dashboard', [LocationAdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/employee/{employeeId}/attendance', [LocationAdminController::class, 'showEmployeeAttendance'])->name('showEmployeeAttendance');
    // Other location admin routes...
});

// Employee routes
Route::group(['middleware' => ['auth', 'role:Employee'], 'prefix' => 'employee', 'as' => 'employee.'], function () {
    Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('dashboard');
    Route::post('/clock-in', [AttendanceController::class, 'clockIn'])->name('clock_in');
    Route::post('/clock-out', [AttendanceController::class, 'clockOut'])->name('clock_out');
    // Other employee routes...
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

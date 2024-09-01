<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // 'name' instead of 'Name'
            'role_id' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:users,email', // Ensuring email is unique in the users table
            'password' => 'required|string|min:8',
        ]);
    
        // If validation passes, proceed to create the user
        try {
            $user = User::create([
                'name' => $validatedData['name'],
                'role_id' => $validatedData['role_id'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);
    
            // Redirect with a success message
            return redirect()->back()->with('success', 'User registered successfully!');
        } catch (\Exception $e) {
            // Redirect back with an error message in case of any exceptions
            return redirect()->back()->with('error', 'Failed to register user. Please try again.');
        }
    }
}

<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended($this->redirectTo());
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    protected function redirectTo()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return '/admin/dashboard';
        } elseif ($user->isLocationAdmin()) {
            return '/location-admin/dashboard';
        } elseif ($user->isEmployee()) {
            return '/employee/dashboard';
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function register(Request $request)
    {   
        // Validate the request data
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

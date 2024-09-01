<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Location;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $locations = Location::all();
        return view('pages.admin.dashboard', compact('users', 'locations'));
    }

    public function createUser()
    {
        $roles = Role::all();
        $locations = Location::all();
        return view('pages.admin.create_user', compact('roles', 'locations'));
    }

    public function storeUser(Request $request)
    {
        // dd($request->all());

        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'location_id' => $request->location_id,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/admin/dashboard')->with('success', 'User created successfully.');
    }

    // Other methods for editing/deleting users, managing locations, etc.
}

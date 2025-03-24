<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;

// Ensure Admin model is imported

class AdminController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('admin.login'); // Ensure this file exists
    }



    // Handle admin login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
    }


    // Handle admin logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }


    // Show profile page
    public function adminProfile()
    {
        // Get the authenticated admin
        $admin = Auth::guard('admin')->user();

        // Pass the admin data to the view
        return view('admin.pages.profile', compact('admin'));
    }

    // Update admin profile
    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'job' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'country' => 'nullable|string|max:255',
        ]);

        $admin->update($validated);

        return redirect()->route('admin.pages.profile')->with('success', 'Profile updated successfully');
    }

    // Update admin password
    public function updatePassword(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $admin->update(['password' => Hash::make($validated['new_password'])]);

        return redirect()->route('admin.pages.profile')->with('success', 'Password updated successfully');
    }


// Display the list of admins
    public function index()
    {
        $admins = Admin::all(); // Fetch all admins
        return view('admin.pages.register', compact('admins'));
    }
  // Edit an admin
    public function edit(Admin $admin)
    {
        return view('admin.pages.edit-admin', compact('admin'));
    }
    // Update an admin
    public function update(Request $request, Admin $admin)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'country' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'status' => 'required|string|in:Active,Inactive,Pending,Suspended',
        ]);

        $admin->update($validated);

        return redirect()->route('admin.pages.register')->with('success', 'Admin updated successfully!');
    }

    // Delete an admin
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.pages.register')->with('success', 'Admin deleted successfully!');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:8',
            'country' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'status' => 'required|string|in:Active,Inactive,Pending,Suspended',
        ]);

        Admin::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'country' => $validated['country'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.pages.register')->with('success', 'Admin created successfully!');
    }




}

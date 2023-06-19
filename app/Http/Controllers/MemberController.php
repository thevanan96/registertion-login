<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function showRegistrationForm()
    {
        return view('registration');
    }

    public function register(Request $request)
    {
        // Validate the registration form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members',
            'contact_no' => 'required',
            'home_address' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create a new member
        $member = Member::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'contact_no' => $validatedData['contact_no'],
            'home_address' => $validatedData['home_address'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Redirect the user after successful registration
        return redirect()->route('login')->with('success', 'Registration successful. Please login to continue.');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication successful
            $member = Auth::user();
            return redirect()->route('dashboard', ['name' => $member->name]);
        } else {
            // Authentication failed
            return back()->withInput()->withErrors([
                'email' => 'Invalid email or password.',
            ]);
        }
    }

    public function dashboard(Request $request)
    {
        $memberName = $request->query('name');
        return view('dashboard', ['memberName' => $memberName]);
    }
}

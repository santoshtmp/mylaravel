<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.register');
    }

    /**
     * Show the profile
     */
    public function profile()
    {
        //
        return view('users.profile');
    }

    /**
     * Show the form for login a new resource.
     */
    public function login()
    {
        //
        return view('users.login');
    }

    // user logout
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logout sucessfully');
    }

    // authenticate user and perform user login 
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', "You are login sucessfully");
        }
        return back()->withErrors(['email' => 'invalid credentials'])->onlyInput('email');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);
        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);
        // create user
        $user = User::create($formFields);
        // if created login
        if ($user) {
            auth()->login($user);
            return redirect('/profile')->with('message', 'User created and login sucessfully! ');
        } else {
            return redirect('/register')->with('message', 'User created failed! something wrong!.. ');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

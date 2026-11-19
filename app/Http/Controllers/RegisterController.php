<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Display the registration form view.
     */
    public function create()
    {
        // Return the register Blade view inside resources/views/auth/register.blade.php
        return view('auth.register');
    }

    /**
     * Validate registration data, create the user, log them in, and redirect with a flash message.
     */
    public function store(Request $request)
    {
        // Validate name, unique email against users table, and confirmed password
        $validated = $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Create the user; password is automatically hashed via the User model cast
        $user = User::create($validated);

        // Sign in the newly registered user immediately
        Auth::login($user);

        // Redirect to the books list with a welcome flash message
        return redirect()->route('books.index')
            ->with('success', 'Welcome, ' . $user->name . '!');
    }
}
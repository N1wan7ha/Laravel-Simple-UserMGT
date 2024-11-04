<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);

        if (Auth::attempt(['name' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/dashboard')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors([
            'loginname' => 'Incorrect credentials.',
        ])->onlyInput('loginname');
    }

    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:100']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);

        Auth::login($user);
        return redirect('/dashboard')->with('success', 'Registration successful! Logged in automatically.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully!');
    }

    public function dashboard()
    {
        $users = User::all();        
        return view('dashboard', compact('users'));
    }

    public function edit(User $user)
    {
        return view('edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $incomingFields = $request->validate([
            'name' => 'required|min:3|max:10',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($incomingFields);

        return redirect()->route('dashboard')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard')->with('success', 'User deleted successfully!');
    }

    
}

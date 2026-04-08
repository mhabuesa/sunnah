<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function create()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('backend.auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid email or password');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        return redirect()->route('admin.login');
    }
}
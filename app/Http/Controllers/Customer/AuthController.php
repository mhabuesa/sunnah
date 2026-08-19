<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validation
        $request->validate([
            'name'     => 'required|string|max:255',
            'phone'    => 'required|unique:customers,phone',
            'email'    => 'required|email|unique:customers,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create Customer
        $customer = Customer::create([
            'name'     => $request->name,
            'phone'    => $request->phone,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::guard('customer')->login($customer);

        session()->flash('success', 'Registration successful! Welcome to ' . config('app.name'));

        return response()->json([
            'status'   => true,
            'message'  => 'Registration successful',
            'redirect' => url('/')
        ], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('customer')->attempt($request->only('phone', 'password'))) {
            // সেশনে মেসেজ সেট করে দিন
            session()->flash('success', 'Welcome Back');

            return response()->json([
                'status' => true,
                'message' => 'Login successful',
                'redirect' => url('/') // কোথায় পাঠাতে চান
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Invalid phone or password'
        ], 422);
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect('/')->with('success', 'Welcome Back');
    }
}

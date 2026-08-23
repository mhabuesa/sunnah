<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function login()
    {
        return view('frontend.auth.login');
    }

    public function register(Request $request)
    {
        return view('frontend.auth.register');
    }

    public function register_store(Request $request)
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

    public function login_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required',
        ], [
            'phone.required' => 'Phone number is required.',
            'password.required' => 'Password is required.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Check phone exists
        $customer = Customer::where('phone', $request->phone)->first();

        if (!$customer) {
            return response()->json([
                'status' => false,
                'errors' => [
                    'phone' => ['Phone number not found.']
                ],
            ], 422);
        }

        // Check password
        if (!Hash::check($request->password, $customer->password)) {
            return response()->json([
                'status' => false,
                'errors' => [
                    'password' => ['Incorrect password.']
                ],
            ], 422);
        }

        // Login
        Auth::guard('customer')->login($customer);

        session()->flash('success', 'Welcome Back');

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'redirect' => url('/'),
        ], 200);
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect('/')->with('success', 'Welcome Back');
    }
}
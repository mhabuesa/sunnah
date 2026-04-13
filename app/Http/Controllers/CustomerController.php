<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Services\SmsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view("backend.customer.index", compact("customers"));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required',
            'phone'   => 'required|unique:customers,phone',
            'email'   => 'nullable|email|unique:customers,email',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        $customer = Customer::create([
            'name'    => $request->name,
            'phone'   => $request->phone,
            'email'   => $request->email,
            'address' => $request->address,
        ]);


        $smsConfig = smsSetting();
        if ($smsConfig && $smsConfig->account_create_sms == 1) {
            $companyName = config('app.name');
            $message = "Welcome to {$companyName}, {$request->name}! Your account has been created successfully. Happy shopping! \n" . config('app.url');
            $smsService = new SmsService();
            $data = [
                'number' => $request->phone,
                'message' => $message,
            ];
            $smsService->sendMessage($data);
        }



        return response()->json([
            'success' => true,
            'customer' => $customer
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $customers = Customer::query()
            ->when($search, function ($q) use ($search) {
                $q->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
                });
            })
            ->limit(10)
            ->get(['id', 'name', 'phone']);

        return response()->json($customers);
    }
    public function updateInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $customer = Customer::findOrFail($request->id);

        $customer->update([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return response()->json([
            'success' => true,
            'customer' => $customer
        ]);
    }
}
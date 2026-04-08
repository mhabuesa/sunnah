<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use App\Models\BusinessSettingModel;
use App\Models\DeliveryMethod;
use App\Models\FraudCheck;
use App\Models\SmsConfig;
use App\Traits\ImageSaveTrait;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    use ImageSaveTrait;

    public function business()
    {
        $data = BusinessSettingModel::first();
        return view('backend.settings.business', compact('data'));
    }

    public function business_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'header_logo' => 'nullable|image',
            'footer_logo' => 'nullable|image',
            'favicon' => 'nullable|image',
        ]);

        $setting = BusinessSettingModel::first();

        // ================== IMAGE UPLOAD ==================

        // Header Logo
        if ($request->hasFile('header_logo')) {
            if (!empty($setting?->header_logo)) {
                $this->deleteImage(public_path($setting->header_logo));
            }
            $header_logo = $this->saveImage('setting', $request->file('header_logo'));
        }

        // Footer Logo
        if ($request->hasFile('footer_logo')) {
            if (!empty($setting?->footer_logo)) {
                $this->deleteImage(public_path($setting->footer_logo));
            }
            $footer_logo = $this->saveImage('setting', $request->file('footer_logo'));
        }

        // Favicon
        if ($request->hasFile('favicon')) {
            if (!empty($setting?->favicon)) {
                $this->deleteImage(public_path($setting->favicon));
            }
            $favicon = $this->saveImage('setting', $request->file('favicon'));
        }

        // ================== DATA PREPARE ==================
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'powered' => $request->powered,
            'address' => $request->address,
            'header_logo' => $header_logo ?? $setting->header_logo ?? null,
            'footer_logo' => $footer_logo ?? $setting->footer_logo ?? null,
            'favicon' => $favicon ?? $setting->favicon ?? null,
        ];

        // ================== CREATE OR UPDATE ==================
        if ($setting) {
            $setting->update($data);
        } else {
            BusinessSettingModel::create($data);
        }

        return redirect()->back()->with('success', 'Business Info Updated');
    }

    public function core_setting()
    {
        $timezones = DateTimeZone::listIdentifiers();
        $data = AppSetting::first();
        return view('backend.settings.app', compact('data', 'timezones'));
    }

    public function core_update(Request $request)
    {
        $request->validate([
            'app_name' => 'required',
            'app_url' => 'required',
            'timezone' => 'required',
        ]);

        $appSetting = AppSetting::first();

        $data = [
            'app_name' => $request->app_name,
            'app_url' => $request->app_url,
            'timezone' => $request->timezone,
        ];

        if ($appSetting) {
            $appSetting->update($data);
        } else {
            AppSetting::create($data);
        }

        return redirect()->back()->with('success', 'App Setting Updated');
    }

    public function invoice_setting()
    {
        $data = AppSetting::first();
        return view('backend.settings.invoice', compact('data'));
    }
    public function invoice_update(Request $request)
    {
        $appSetting = AppSetting::first();

        if ($appSetting) {
            $appSetting->update([
                'invoice' => $request->invoice_type
            ]);
        } else {
            AppSetting::create([
                'invoice' => $request->invoice_type
            ]);
        }
        return redirect()->back()->with('success', 'Invoice Setting Updated');
    }

    public function delivery_setting()
    {
        $delivery = DeliveryMethod::all()->keyBy('name');

        $methods = ['steadfast', 'pathao', 'redx'];

        foreach ($methods as $method) {
            $delivery[$method] = $delivery[$method] ?? new \App\Models\DeliveryMethod([
                'name' => $method,
                'status' => 0,
                'config' => [
                    'base_url' => '',
                    'token' => ''
                ]
            ]);
        }

        return view('backend.settings.delivery', compact('delivery'));
    }

    public function steadfast(Request $request)
    {
        $request->validate([
            'base_url' => 'required',
            'api_key' => 'required',
            'secret_key' => 'required',
        ]);

        DeliveryMethod::updateOrCreate(
            ['name' => 'steadfast'],
            [
                'config' => [
                    'base_url' => $request->base_url,
                    'api_key' => $request->api_key,
                    'secret_key' => $request->secret_key,
                ]
            ]
        );

        return redirect()->back()->with('success', 'Steadfast Delivery Updated');
    }

    public function pathao(Request $request)
    {
        $request->validate([
            'base_url' => 'required',
            'store_id' => 'required',
            'client_id' => 'required',
            'client_secret' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        DeliveryMethod::updateOrCreate(
            ['name' => 'pathao'],
            [
                'config' => [
                    'base_url' =>  $request->base_url,
                    'store_id' =>  $request->store_id,
                    'client_id' =>  $request->client_id,
                    'client_secret' =>  $request->client_secret,
                    'username' =>  $request->username,
                    'password' =>  $request->password,
                ]
            ]
        );

        return redirect()->back()->with('success', 'Pathao Delivery Updated');
    }

    public function redx(Request $request)
    {
        $request->validate([
            'base_url' => 'required',
            'token' => 'required',
        ]);

        DeliveryMethod::updateOrCreate(
            ['name' => 'redx'],
            [
                'config' => [
                    'base_url' =>  $request->base_url,
                    'token' =>  $request->token,
                ]
            ]
        );

        return redirect()->back()->with('success', 'Redx Delivery Updated');
    }

    public function steadfast_status()
    {
        $status = DeliveryMethod::where('name', 'steadfast')->first();
        try {
            // Update category status
            $status->update([
                'status' => $status->status == '1' ? '0' : '1',
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Steadfast status Updated Successfully'], 200);
    }

    public function pathao_status()
    {
        $status = DeliveryMethod::where('name', 'pathao')->first();
        try {
            // Update category status
            $status->update([
                'status' => $status->status == '1' ? '0' : '1',
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Pathao status Updated Successfully'], 200);
    }

    public function redx_status()
    {
        $status = DeliveryMethod::where('name', 'redx')->first();
        try {
            // Update category status
            $status->update([
                'status' => $status->status == '1' ? '0' : '1',
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'Redx status Updated Successfully'], 200);
    }

    public function sms()
    {
        $smsConfig = SmsConfig::first();
        return view('backend.settings.sms', compact('smsConfig'));
    }
    public function sms_update(Request $request)
    {
        $request->validate([
            'api_key' => 'required',
            'sender_id' => 'required',
        ]);
        $smsConfig = SmsConfig::first();

        $data = [
            'api_key' => $request->api_key,
            'sender_id' => $request->sender_id,
        ];

        if ($smsConfig) {
            $smsConfig->update($data);
        } else {
            SmsConfig::create($data);
        }

        return redirect()->back()->with('success', 'SMS Config Updated');
    }

    public function sms_config_update(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'value' => 'required|in:0,1',
        ]);

        $allowedFields = [
            'account_create_sms',
            'order_placed_sms',
            'sent_to_delivery_sms',
            'order_canceled_sms',
            'delivery_success_sms',
        ];

        if (!in_array($request->type, $allowedFields)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid field'
            ]);
        }

        // ✅ always ensure single row exists
        $config = SmsConfig::firstOrCreate([]);

        $config->update([
            $request->type => $request->value
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Updated successfully',
            'field' => $request->type,
            'value' => $request->value
        ]);
    }

    public function fraudCheck()
    {
        $fraudCheck = FraudCheck::all()->keyBy('name');

        $methods = ['bdCourier', 'hoorin'];

        foreach ($methods as $method) {
            $fraudCheck[$method] = $fraudCheck[$method] ?? new \App\Models\FraudCheck([
                'name' => $method,
                'status' => 0,
                'api_key' => ''
            ]);
        }

        return view('backend.settings.fraudCheck', compact('fraudCheck'));
    }
    public function fraudCheck_update(Request $request)
    {
        $request->validate([
            'api_key' => 'required'
        ]);

        FraudCheck::updateOrCreate(
            ['name' => 'bdCourier'],
            [
                'api_key' => $request->api_key
            ]
        );

        return redirect()->back()->with('success', 'BD Courier Fraud Checker Updated');
    }

    public function fraudCheck_status()
    {
        $status = FraudCheck::where('name', 'bdCourier')->first();
        try {
            // Update category status
            $status->update([
                'status' => $status->status == '1' ? '0' : '1',
            ]);
        } catch (\Exception $e) {
            Log::error($e);
            return error($e->getMessage());
        }

        return response()->json(['success' => true, 'message' => 'BD Courier status Updated Successfully'], 200);
    }
}
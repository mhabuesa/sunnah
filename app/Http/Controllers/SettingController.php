<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use App\Models\BusinessSettingModel;
use App\Traits\ImageSaveTrait;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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
            'debug_mode' => 'required',
            'timezone' => 'required',
        ]);

        $appSetting = AppSetting::first();

        $data = [
            'app_name' => $request->app_name,
            'app_url' => $request->app_url,
            'debug_mode' => $request->debug_mode,
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
                'invoice'=>$request->invoice_type
            ]);
        } else {
            AppSetting::create([
                'invoice'=>$request->invoice_type
            ]);
        }
         return redirect()->back()->with('success', 'Invoice Setting Updated');
    }
}
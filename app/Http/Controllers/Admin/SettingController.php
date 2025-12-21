<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        //fetch all settings - key-value
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        if ($request->hasFile('website_logo')) {
            $path = $request->file('website_logo')->store('settings', 'public');
            Setting::updateOrCreate(['key' => 'website_logo'], ['value' => $path]);
        }

        if ($request->hasFile('admin_logo')) {
            $path = $request->file('admin_logo')->store('settings', 'public');
            Setting::updateOrCreate(['key' => 'admin_logo'], ['value' => $path]);
        }

        $data = $request->except(['_token', 'website_logo', 'admin_logo']);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return back()->with('success', 'Settings updated successfully');
    }
}
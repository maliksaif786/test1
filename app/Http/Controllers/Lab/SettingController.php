<?php

namespace App\Http\Controllers\Lab;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function category_alert()
    {
        $settings = Setting::all();
        $categories = Category::all();
        return view('lab_admin.settings.alert_setting',compact('settings','categories'));
    }

    public function category_alert_save(Request $request)
    {
        $setting = new Setting();
        $setting->category_id = $request->category_id;
        $setting->role = $request->role;
        $setting->day = $request->day;
        $setting->save();
        toastr()->success('Setting Added successfully');
        return redirect('category_alert');
    }
}

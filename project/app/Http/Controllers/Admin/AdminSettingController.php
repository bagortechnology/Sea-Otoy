<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class AdminSettingController extends Controller
{
    public function index()
    {
        $setting_data = Setting::where('id',1)->first();
        return view('admin.setting', compact('setting_data'));
    }

    public function update(Request $request)
    {
        $obj = Setting::where('id',1)->first();
        if($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'image|mimes:jpg,jpeg,png,gif,svg'
            ]);
            unlink('uploads/'.$obj->logo);
            $ext = $request->file('logo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('logo')->move('uploads/',$final_name);
            $obj->logo = $final_name;
        }
        if($request->hasFile('favicon')) {
            $request->validate([
                'favicon' => 'image|mimes:jpg,jpeg,png,gif,svg,ico'
            ]);
            unlink('uploads/'.$obj->favicon);
            $ext = $request->file('favicon')->extension();
            $final_name = time().'.'.$ext;
            $request->file('favicon')->move('uploads/',$final_name);
            $obj->favicon = $final_name;
        }

        $obj->top_bar_phone = $request->top_bar_phone;
        $obj->top_bar_email = $request->top_bar_email;
        $obj->footer_address = $request->footer_address;
        $obj->footer_phone = $request->footer_phone;
        $obj->footer_email = $request->footer_email;
        $obj->copyright = $request->copyright;
        $obj->facebook = $request->facebook;
        $obj->analytic_id = $request->analytic_id;
        $obj->theme_color_1 = $request->theme_color_1;
        $obj->theme_color_2 = $request->theme_color_2;
        $obj->update();

        return redirect()->back()->with('success', 'Setting is updated successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function profile_submit(Request $request)
    {
        $admin_data = Admin::where('email',Auth::guard('admin')->user()->email)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if($request->password!='')
        {
            $password = $request->input('password');
        
            if (strlen($password) < 8) {
                return redirect()->back()->withErrors(['password' => 'Password should be at least 8 characters long.']);
            }
        
            if (!preg_match('/[a-zA-Z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[^a-zA-Z0-9]/', $password)) {
                return redirect()->back()->withErrors(['password' => 'Password should contain letters, numbers, and special characters.']);
            }
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);
            $admin_data->password = Hash::make($request->password);
        }

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif,svg'
            ]);

            unlink('uploads/'.$admin_data->photo);

            $ext = $request->file('photo')->extension();
            $final_name = 'admin'.'.'.$ext;

            $request->file('photo')->move('uploads/',$final_name);

            $admin_data->photo = $final_name;
        }

        
        $admin_data->name = $request->name;
        $admin_data->email = $request->email;
        $admin_data->update();

        return redirect()->back()->with('success', 'Profile information is saved successfully.');
    }
}

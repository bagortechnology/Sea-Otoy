<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use DateTime;

class CustomerAuthController extends Controller
{
    public function index()
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer_home');
        } elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            return redirect()->route('admin_logout');
        }

        return view('front.login');
    }

    public function login()
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer_home');
        }
        return view('front.login');
    }

    public function login_submit(Request $request)
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer_home');
        }

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1
        ];
    
        if (Auth::guard('customer')->attempt($credential)) {
            $user = Auth::guard('customer')->user();
            $user->update(['updated_at' => new DateTime()]);
    
            return redirect()->route('home')->with('success', 'Successfully Login!');
        } else {
            return redirect()->route('customer_login')->with('error', 'Sorry, your email or password is incorrect!');
        }
    }

    public function signup()
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer_home');
        }

        return view('front.signup');
    }

    public function signup_submit(Request $request)
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer_home');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[^a-zA-Z0-9])/',
            ],
            'retype_password' =>'required|same:password',
        ]);

        $token = hash('sha256', time());
        $password = Hash::make($request->password);
        $verification_link = url('signup-verify/'.$request->email.'/'.$token);

        $obj = new Customer();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->password = $password;
        $obj->token = $token;
        $obj->status = 0;
        $obj->save();

        $subject = 'Sign Up Verification';
        $message = '<h2>Email Confirmation</h2>';
        $message .= 'Please click on the link below to confirm sign up process:<br>';
        $message .= '<a href="'.$verification_link.'">';
        $message .= $verification_link;
        $message .= '</a>';

        Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success', 'To complete the signup, please check your email and click on the link');

    }

    public function signup_verify($email,$token)
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer_home');
        }

        $customer_data = Customer::where('email',$email)->where('token',$token)->first();

        if($customer_data) {
            
            $customer_data->token = '';
            $customer_data->status = 1;
            $customer_data->update();

            return redirect()->route('customer_login')->with('success', 'Your account is verified successfully!');

        } else {
            return redirect()->route('customer_login');
        }
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer_login');
    }

    public function forget_password()
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer_home');
        }
        return view('front.forget_password');
    }

    public function forget_password_submit(Request $request)
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer_home');
        }
        $request->validate([
            'email' => 'required|email'
        ]);

        $customer_data = Customer::where('email',$request->email)->first();
        if(!$customer_data) {
            return redirect()->back()->with('error','Email address not found!');
        }

        $token = hash('sha256',time());

        $customer_data->token = $token;
        $customer_data->update();

        $reset_link = url('reset-password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = '<h2>Reset Password</h2>';
        $message .= 'Please click on the following link to reset the password: <br>';
        $message .= '<a href="'.$reset_link.'">Click here</a>';

        Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->route('customer_login')->with('success','Please check your email and follow the steps there');

    }


    public function reset_password($token,$email)
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer_home');
        }

        $customer_data = Customer::where('token',$token)->where('email',$email)->first();
        if(!$customer_data) {
            return redirect()->route('customer_login');
        }

        return view('front.reset_password', compact('token','email'));

    }

    public function reset_password_submit(Request $request)
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('customer_home');
        }

        $request->validate([
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[^a-zA-Z0-9])/',
            ],
            'retype_password' =>'required|same:password',
        ]);

        $customer_data = Customer::where('token',$request->token)->where('email',$request->email)->first();

        $customer_data->password = Hash::make($request->password);
        $customer_data->token = '';
        $customer_data->update();

        return redirect()->route('customer_login')->with('success', 'Password is reset successfully');

    }

}

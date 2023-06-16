<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::get();
        return view('admin.customer', compact('customers'));
    }

    public function change_status($id)
    {
        $customer_data = Customer::where('id',$id)->first();
        if($customer_data->status == 1) {
            $customer_data->status = 0;
        } else {
            $customer_data->status = 1;
        }
        $customer_data->update();
        return redirect()->back()->with('success', 'Status is changed successfully.');
    }
    
        public function delete($id)
    {
        $customer = Customer::find($id);
        if ($customer) {
            $customer->delete();
            return redirect()->back()->with('success', 'Customer deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Customer cannot be deleted.');
        }
    }
}

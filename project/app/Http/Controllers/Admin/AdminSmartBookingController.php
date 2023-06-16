<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BookedRoom;

class AdminSmartBookingController extends Controller
{
    public function index()
    {
        return view('admin.smart_bookings');
    }

    public function show(Request $request) 
    {
        $request->validate([
            'selected_date' => 'required'
        ]);

        $selected_date = $request->selected_date;

        return view('admin.smart_bookings_detail', compact('selected_date'));
    }
}

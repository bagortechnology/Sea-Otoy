<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $room_all = Room::paginate(12);
        return view('front.room', compact('room_all'));
    }

    public function single_room($id)
    {
        $single_room_data = Room::with('rRoomPhoto')->where('id',$id)->first();
        return view('front.room_detail', compact('single_room_data'));
    }
    
 public function search(Request $request)
    {
        $checkinCheckout = $request->input('checkin_checkout');
        $adults = $request->input('adult');
        $children = $request->input('children');

        
        $rooms = Room::where('available', true)
            ->where('total_guests', '>=', $adults + $children)
            ->get();


        return view('front.search', compact('rooms'));
    }

}

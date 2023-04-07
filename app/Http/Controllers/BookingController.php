<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {   
        $user = Auth::user();
        $rooms = Room::all();
        $netcost = Room::sum('price');
        $netgst = Room::sum('gst');
        $availableRooms = Room::select('SELECT name, COUNT(*) as count FROM rooms WHERE available = true GROUP BY name');
        return view('booking.book', compact('rooms','availableRooms','netcost','netgst','user'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'room_type_1' => 'required',
            'no_room_1' => 'numeric|min:1',
            'room_type_2' => 'nullable',
            'no_room_2' => 'numeric|nullable',
            'room_type_3' => 'nullable',
            'no_room_3' => 'numeric|nullable',
            'room_type_4' => 'nullable',
            'no_room_4' => 'numeric|nullable',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date', 
            'discount' => 'numeric|nullable',  
            'mealplan' => 'required|string|max:255',
            'adult' => 'required|numeric|min:1',
            'booking_status' => 'required|string|max:255',
            'booking_source' => 'required|string|max:255',
            'booking_type' => 'required|string|max:255',
            'note' => 'nullable|string', 
            'cost' => 'required|numeric',
            'gst' => 'required|numeric',
            'total_cost' => 'required|numeric',
        ]);
        
        $booking = new Booking;
        $booking->user_id = Auth::user()->id;
        $booking->room_type_1 = $request->room_type_1;
        $booking->no_room_1 = $request->no_room_1;
        $booking->room_type_2 = $request->room_type_2;
        $booking->no_room_2 = $request->no_room_2;
        $booking->room_type_3 = $request->room_type_3;
        $booking->no_room_3 = $request->no_room_3;
        $booking->room_type_4 = $request->room_type_4;
        $booking->no_room_4 = $request->no_room_4;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->checkin_date = $request->checkin_date;
        $booking->checkout_date = $request->checkout_date;
        $booking->discount = $request->discount;
        $booking->mealplan = $request->mealplan;
        $booking->adult = $request->adult;
        $booking->booking_status = $request->booking_status;
        $booking->booking_source = $request->booking_source;
        $booking->booking_type = $request->booking_type;
        $booking->note = $request->note;
        $booking->cost = $request->cost;
        $booking->gst = $request->gst;
        $booking->total_cost = $request->total_cost;
        $booking->save();
        return redirect()->route('bookings.view')->with('success', 'Booking created successfully!');
    }

    public function view()
    {
        $user = Auth::user();
        $userId = Auth::id();
        $bookings = Booking::where('user_id', $userId)->get();    
        return view('booking.index', compact('bookings','user'));
    }

    public function show($user_id)
    {
        $user = Auth::user();
        $booking = Booking::find($user_id); 
        return view('booking.view', compact('booking','user'));
    }   
}
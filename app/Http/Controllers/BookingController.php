<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        Booking::create([
            'user_id' => auth()->id(),
            'event_id' => $request->event_id,
        ]);

        return redirect()->route('bookings.index')->with('status', 'Réservation effectuée !');
    }

    public function index()
{
    $bookings = Booking::with('event')->where('user_id', auth()->id())->get();
    return view('bookings.index', compact('bookings'));
}


    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('status', 'Réservation annulée !');
    }
}

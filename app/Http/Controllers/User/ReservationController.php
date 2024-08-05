<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reservations = $user->events;
        return view('user.reservations.index', compact('reservations'));
    }

    public function destroy(Event $event)
    {
        $user = Auth::user();
        $user->events()->detach($event->id);

        return redirect()->route('user.reservations.index')->with('success', 'Réservation annulée avec succès.');
    }
}

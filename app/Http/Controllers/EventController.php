<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('category')->get();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('events.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Événement créé avec succès.');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('events.edit', compact('event', 'categories'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Événement mis à jour avec succès.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Événement supprimé avec succès.');
    }

    public function reserve(Request $request, Event $event)
    {
        // Vérifiez si l'utilisateur est connecté
        if (!Auth::check()) {
            // Redirection vers la page de connexion ou d'inscription
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour réserver un événement.');
        }

        $user = Auth::user();
        
        // Vérifiez si l'utilisateur a déjà réservé cet événement
        if ($user->events->contains($event->id)) {
            return redirect()->route('events.index')->with('error', 'Vous avez déjà réservé cet événement.');
        }

        // Ajouter l'événement aux réservations de l'utilisateur
        $user->events()->attach($event->id);

        return redirect()->route('events.index')->with('success', 'Réservation effectuée.');
    }
    public function cancel(Request $request, Event $event)
    {
        $user = Auth::user();
        $user->events()->detach($event->id);
    
        return redirect()->route('reservations.index')->with('success', 'Réservation annulée.');
    }
}

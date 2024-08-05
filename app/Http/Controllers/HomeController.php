<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Récupérer tous les événements avec leurs catégories
        $events = Event::with('category')->get()->groupBy('category_id');
        
        // Assurez-vous que la date est un objet Carbon
        foreach ($events as $eventCategory) {
            foreach ($eventCategory as $event) {
                $event->date = \Carbon\Carbon::parse($event->date);
            }
        }
        
        $categories = Category::all();
        return view('home', compact('events', 'categories'));
    }
}

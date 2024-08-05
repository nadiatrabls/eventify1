<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Par exemple, afficher un tableau de bord ou une vue d'accueil pour l'admin
        return view('admin.index');
    }

    public function manageCategories()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function manageEvents()
    {
        $events = Event::with('category')->get();
        return view('admin.events.index', compact('events'));
    }

    public function viewReservations()
    {
        // Logique pour afficher les réservations
        $events = Event::with('users')->get();
        return view('admin.reservations.index', compact('events'));
    }
}

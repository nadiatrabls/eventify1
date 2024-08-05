<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

// Routes pour les visiteurs non connectés
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Routes pour les utilisateurs connectés
Route::middleware('auth')->group(function () {
    Route::post('/events/{event}/reserve', [BookingController::class, 'store'])->name('events.reserve');
    Route::delete('/events/{event}/cancel', [BookingController::class, 'destroy'])->name('events.cancel');
    Route::get('/reservations', [BookingController::class, 'index'])->name('bookings.index'); // Assurez-vous que le nom de route est correct
    Route::delete('/reservations/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
});
// Route pour la connexion admin
Route::get('/admin-login', [AuthController::class, 'adminLogin'])->name('admin.login');


// Routes pour les administrateurs
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin/categories', CategoryController::class);
    Route::resource('admin/events', AdminEventController::class);
    Route::get('/admin/reservations', [AdminEventController::class, 'reservations'])->name('admin.reservations.index');
});


Auth::routes();


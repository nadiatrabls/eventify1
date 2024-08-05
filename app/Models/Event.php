<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'description', 'date', 'time', 'location', 'category_id'];
    protected $casts = [
        'date' => 'datetime',
        'time' => 'datetime:H:i',
    ];
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'event_user');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    protected $fillable = ['room_name', 'room_image', 'description', 'price', 'location','number_adults', 'is_available', 'status'];
    function room(){
        return $this->hasMany(Room::class, 'room_type_id');
    }
    function booking(){
        return $this->hasManyThrough(Booking::class, Room::class, 'room_type_id', 'room_id');
    }
}

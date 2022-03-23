<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['booking_id', 'paymenttype', 'price','status'];
    function getBooking(){
        return $this->belongsTo(Booking::class, 'room_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['booking_id', 'room_id', 'customer_id','booking_date', 'checkin', 'checkout', 'status'];

    function getRoom(){
        return $this->belongsTo(Room::class, 'room_id');
    }
    function getCustomer(){
        return $this->belongsTo(Customer::class, 'user_id');
    }
    function getPayments(){
        return $this->hasOne(Payment::class);
    }
}

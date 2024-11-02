<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_bookings',
        'name',
        'email',
        'phone',
        'quantity'
    ];

        public function bookings(){
            return $this->belongsto(bookings::class, 'id_bookings'); 
            }   
        }

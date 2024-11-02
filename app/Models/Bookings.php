<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_book','class','price',
    ];


    public function book(){
    return $this->belongsto(book::class, 'id_book'); 
    }
}

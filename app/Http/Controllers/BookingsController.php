<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    
        /**
        * index
        *
        * @return void
        */
        public function index()
        {
        $bookings = Bookings::latest()->paginate(5);
        //render view with posts
        return view('bookings.index', compact('bookings'));
        }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookings;
use Exception;
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
        // Render view with posts
        return view('bookings.index', compact('bookings'));
    }


    public function create()
    {
        $book = Book::all();
        return view('bookings.create', compact('book'));
    }

    public function store(Request $request)
    {
        // Corrected validation - pass only an array of rules
        $request->validate([
            'id_book' => 'required',
            'class' => 'required',
            'price' => 'required'
        ]);

        // Create a new booking
        Bookings::create([
            'id_book' => $request->id_book,
            'class' => $request->class,
            'price' => $request->price
        ]);

        try {
            return redirect()->route('bookings.index')->with('success', 'Booking Created Successfully!');
        } catch (Exception $e) {
            return redirect()->route('bookings.index')->with('error', 'Error Occurred During Process');
        }
    }

    public function edit($id)
    {
        $bookings = Bookings::find($id);
        $book = Book::all();
        return view('bookings.edit', compact('bookings', 'book'));
    }

    public function update(Request $request, $id)
    {
        $bookings = Bookings::find($id);

        // Corrected validation - pass only an array of rules
        $request->validate([
            'id_book' => 'nullable',
            'class' => 'nullable',
            'price' => 'nullable'
        ]);

        // Update fields if provided
        if ($request->filled('id_book')) {
            $bookings->id_book = $request->id_book;
        }
        if ($request->filled('class')) {
            $bookings->class = $request->class;
        }
        if ($request->filled('price')) {
            $bookings->price = $request->price;
        }

        // Save the updated booking
        $bookings->save();

        return redirect()->route('bookings.index')->with('success', 'Data Changed Successfully!');
    }

    public function destroy($id)
    {
        $bookings = Bookings::find($id);
        $bookings->delete();
        return redirect()->route('bookings.index')->with('success', 'Data Deleted Successfully!');
    }
}

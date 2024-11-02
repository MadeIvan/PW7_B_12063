<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookings;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::latest()->paginate(5);
        return view('customer.index', compact('customer'));
    }

    public function create()
    {
        $book=Book::all();
        $bookings = Bookings::all();
        return view('customer.create', compact('bookings','book'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_bookings' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'quantity' => 'required',
        ]);

        Customer::create([
            'id_bookings' => $request->id_bookings,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('customer.index')->with('success', 'Booking Created Successfully!');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $bookings = Bookings::all();
        $book=Book::all();

        return view('customer.edit', compact('customer', 'bookings','book'));
    }

    public function update(Request $request, $id)
    {
        
        $customer = Customer::findOrFail($id);
        $book=Book::all();

        $request->validate([
            'id_bookings' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'quantity' => 'required',
        ]);

        if ($request->filled('id_bookings')) {
            $customer->id_bookings = $request->id_bookings;
        }
        if ($request->filled('name')) {
            $customer->name = $request->name;
        }
        if ($request->filled('email')) {
            $customer->email = $request->email;
        }
        if ($request->filled('phone')) {
            $customer->phone = $request->phone;
        }
        if ($request->filled('quantity')) {
            $customer->quantity = $request->quantity;
        }

        $customer->save();

        return redirect()->route('customer.index')->with('success', 'Data Changed Successfully!');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Data Deleted Successfully!');
    }
}

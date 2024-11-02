<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use App\Models\Book;
use Faker\Core\File;
use Laravel\Pail\Files;
use SebastianBergmann\Type\VoidType;

class BookController extends Controller
{
/**
 * index
 *  @return void
 */
    


    public function index(){

    $book = Book::latest()->paginate(5);
    
    return view('book.index', compact('book'));  
    }
/**
* create
*
* @return void
*/
    public function create()
    {
        return view('book.create');
    }
/**
* store
*
* @param Request $request
* @return void
*/
public function store(Request $request){
  // Validate the form input
$request->validate([
    'title' => 'required',
    'author' => 'required',
    'pages' => 'required',
    'poster' => 'nullable|image' // Ensure the image is validated if provided
]);

// Handle the image upload
if ($request->hasFile('poster')) {
    $poster = $request->file('poster');
    $posterName = time() . '_' . $poster->getClientOriginalName(); 
    $poster->move(public_path('public/image'), $posterName); 
    $imagePath = 'public/image/' . $posterName;
} else {
    $imagePath = null; 
}

// Save the data to the database
Book::create([
    'title' => $request->title,
    'author' => $request->author,
    'pages' => $request->pages,
    'poster' => $imagePath,
]);

try {
    return redirect()->route('book.index')->with('success', 'Book created successfully!');
} catch (Exception $e) {
    return redirect()->route('book.index')->with('error', 'An error occurred while processing.');
}
}
/**
* edit  
*
* @param int $id
* @return void
*/
public function edit($id){
    $book = Book::find($id);
    return view('book.edit', compact('book'));
}
/**
* update
*
* @param mixed $request
* @param int $id
* @return void
*/
public function update(Request $request, $id){
    $book = Book::find($id);
    if (!$book) {
        return redirect()->route('book.index')->with('error', 'Book not found.');
    }

    // Validate the form input
    $request->validate([
        'title' => 'nullable',
        'author' => 'nullable',
        'pages' => 'nullable',
        'poster' => 'nullable|image'
    ]);

    // Update the book properties if the input is provided
    if ($request->filled('title')) {
        $book->title = $request->title;
    }
    if ($request->filled('author')) {
        $book->author = $request->author;
    }
    if ($request->filled('pages')) {
        $book->pages = $request->pages;
    }

    // Handle the poster update
    if ($request->hasFile('poster')) {
        $poster = $request->file('poster');
        $posterName = $poster->getClientOriginalName();
        $poster->move(public_path('public/image'), $posterName);
        $posterPath = 'public/image/' . $posterName;

        $book->poster = $posterPath;
    }

    $book->save();

    return redirect()->route('book.index')->with('success', 'Data Berhasil Diubah!');
}
/**
* destroy
*
* @param int $id
* @return void
*/

public function destroy($id){
    $book = Book::find($id);
    $book->delete();
    return redirect()->route('book.index')->with(['success' => 'Data
    Berhasil Dihapus!']);
}

}

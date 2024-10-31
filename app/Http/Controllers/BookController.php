<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use App\Models\Book;
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
//Validasi Formulir
    $request->validate($request, [
        'title' => 'required',
        'author' => 'required',
        'pages' => 'required'
    ]);
//Fungsi Simpan Data ke dalam Database
    Book::create([
        'title' => $request->title,
        'author' => $request->author,
        'pages' => $request->pages
    ]);
    try {
        return redirect()->route('book.index');
    } catch (Exception $e) {
        return redirect()->route('book.index');
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
//validate form
    $request->validate($request, [
        'title' => 'required',
        'author' => 'required',
        'pages' => 'required'
    ]);
    $book->update([
        'title' => $request->title,
        'author' => $request->author,
        'pages' => $request->pages
    ]);
    return redirect()->route('book.index')->with(['success' => 'Data
    Berhasil Diubah!']);
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

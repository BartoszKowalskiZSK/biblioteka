<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Rent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends Controller
{
    public function store(Request $request){

        $validatedData = Validator::make($request->all(), [
            'name'=>'required|string|max:255',
            'description'=>'required|string|max:1000',
            'ISBN'=>'required|string|max:13',
            'author'=>'required|integer|exists:authors,id',
        ]);

        if($validatedData->fails()){
            return redirect()->back()->with('error',$validatedData->errors())->withInput();
        }
        $book = new Book;
        $book->name = $request->input('name');
        $book->description = $request->input('description');
        $book->ISBN = $request->input('ISBN');
        $book->author_id = $request->input('author');
        $book->save();

        return redirect()->back()->with('success', 'Książka dodana pomyślnie!');
    }

    public function update(Request $request, $id)
    {   
        try {
            $book = Book::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->flash('error', 'Nie znaleziono książki o podanym ID')->withInput();
        }

        $validatedData = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string|max:1000',
            'ISBN' => 'sometimes|required|unique:books,ISBN,'.$id .'|string|max:13',
            'author_id' => 'sometimes|required|integer|exists:authors,id',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()->flash('error',$validatedData->errors())->withInput();
        }

        $hasChanged = false;
        if ($request->has('name') && $book->name != $request->input('name')) {
            $book->name = $request->input('name');
            $hasChanged = true;
        }

        if ($request->has('description') && $book->description != $request->input('description')) {
            $book->description = $request->input('description');
            $hasChanged = true;
        }

        if ($request->has('ISBN') && $book->ISBN != $request->input('ISBN')) {
            $book->ISBN = $request->input('ISBN');
            $hasChanged = true;
        }

        if ($request->has('author_id') && $book->author_id != $request->input('author_id')) {
            $book->author_id = $request->input('author_id');
            $hasChanged = true;
        }

        if ($request->has('amount') && $book->amount != $request->input('amount')) {
            $book->amount = $request->input('amount');
            $hasChanged = true;
        }

        $book->save();

        return redirect()->back()->flash('success', 'Książka zaktualizowana pomyślnie!');
    }

    public function read()
    {
        $books = Book::all();
        $notRentedBooks = [];

        foreach ($books as $book) {
            $isRented = Rent::where('book_id', $book->id)
                ->where('returned', false)
                ->exists();

            if (!$isRented) {
                $notRentedBooks[] = $book;
            }
        }
        return view('books')->with('books', $notRentedBooks);
    }

    public function readAll()
    {
        $books = Book::all();
        
        return view('books')->with('books', $books);
    }

    public function add(){
        $authors = Author::get();
        return view('add-book')->with('authors',$authors);
    }

    public function delete($id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->delete();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Nie znaleziono książki o podanym ID')->withInput();
        }

        return redirect()->back()->with('success', 'Książka usunięta pomyślnie!');
    }

    public function book(Request $request, $bookId){
        $book = Book::where('id','==',$bookId);
        return view('book')->with('success', $book);
    }


}


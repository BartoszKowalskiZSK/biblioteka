<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function store(Request $request){

        $validatedData = Validator::make($request->all(), [
            'name'=>'required|string|max:255',
            'description'=>'required|string|max:1000',
            'ISBN'=>'required|unique::books,ISBN|string|max:13',
            'author'=>'required|integer|exists:authors,id',
            'amount'=>'required|integer'
        ]);

        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData->errors())->withInput();
        }
        $book = new Book;
        $book->name = $request->input('name');
        $book->description = $request->input('description');
        $book->ISBN = $request->input('ISBN');
        $book->author_id = $request->input('author_id');
        $book->amount = $request->input('amount');
        $book->save();

        return redirect()->back()->with('success', 'Książka dodana pomyślnie!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
        ]);
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData->errors())->withInput();
        }
        $author = new Author;
        $author->name = $request->input('name');
        $author->surname = $request->input('surname');
        $author->save();

        return redirect()->back()->with('success', 'Autor dodany pomyślnie!');
    }
}

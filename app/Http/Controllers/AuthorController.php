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



    public function update(Request $request, $id)
{
    // Find the author by ID
    $author = Author::findOrFail($id);

    // Validate the request
    $validatedData = Validator::make($request->all(), [
        'name' => 'sometimes|required|string|max:255',
        'surname' => 'sometimes|required|string|max:255',
    ]);

    // If the validation fails, redirect back with errors
    if ($validatedData->fails()) {
        return redirect()->back()->withErrors($validatedData->errors())->withInput();
    }

    // If a name was provided, update the author's name
    if ($request->has('name')) {
        $author->name = $request->input('name');
    }

    // If a surname was provided, update the author's surname
    if ($request->has('surname')) {
        $author->surname = $request->input('surname');
    }

    // Save the updated author
    $author->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Autor zaktualizowany pomyślnie!');
}
}

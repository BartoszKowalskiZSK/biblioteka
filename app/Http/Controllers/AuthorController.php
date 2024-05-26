<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Validator;

use Illuminate\Database\Eloquent\ModelNotFoundException;

    class AuthorController extends Controller
    {
        public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
        ]);

        if($validatedData->fails()){
            return redirect()->back()->flash('error', $validatedData->errors())->withInput();
        }

        $author = new Author;
        $author->name = $request->input('name');
        $author->surname = $request->input('surname');
        $author->save();
        $request->reset();
        return redirect()->back()->flash('success', 'Autor dodany pomyślnie!');
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $validatedData = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'surname' => 'sometimes|required|string|max:255',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()->flash('error', $validatedData->errors())->withInput();
        }

        if ($request->has('name')) {
            $author->name = $request->input('name');
        }

        if ($request->has('surname')) {
            $author->surname = $request->input('surname');
        }

        $author->save();
        return redirect()->back()->flash('success', 'Autor zaktualizowany pomyślnie!');
    }

    public function delete($id)
    {
        try {
            $author = Author::findOrFail($id);
            $author->delete();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->flash('error', 'Nie znaleziono autora o podanym id!')->withInput();
        }
        return redirect()->back()->flash('success', 'Autor usunięty pomyślnie!');
    }

}

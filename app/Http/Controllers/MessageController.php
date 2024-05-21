<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'topic' => 'required|string|max:255',
            'description' => 'required|string',
            'email' => 'required|email',
        ]);

        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData->errors())->withInput();
        }

        $message = new Message;

        $message->topic = $request->input('topic');
        $message->description = $request->input('description');
        $message->email = $request->input('email');
        $message->time = now();

        $message->save();

        return redirect()->back()->with('success', 'Wiadomość została przesłana pomyślnie!');
    }

    public function read($id)
    {
        try {
            $message = Message::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Nie znaleziono wiadomości o podanym ID');
        }

        return view('message.read', ['message' => $message]);
    }


public function delete($id)
    {
        try {
            $message = Message::findOrFail($id);
            $message->delete();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Nie znaleziono wiadomości o podanym ID');
        }

        return redirect()->back()->with('success', 'Wiadomość usunięta pomyślnie!');
    }
}
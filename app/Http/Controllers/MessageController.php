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
        //TODO IF USER->CAN() (zmiana walidacji)
        $validatedData = Validator::make($request->all(),[
            'topic' => 'required|string|max:255',
            'description' => 'required|string',
            'email' => 'required|email',
        ]);

        if($validatedData->fails()){
            return redirect()->back()->with('errors', $validatedData->errors())->withInput();
        }

        $message = new Message;

        $message->topic = $request->input('topic');
        $message->description = $request->input('description');
        $message->email = $request->input('email');
        $message->time = now();

        $message->save();

        return redirect()->back()->with('success','Wiadomość została przesłana pomyślnie!');
    }

    public function readToday()
    {
        try {
            $message = Message::whereDate('time', now()->toDateString())->get();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->flash('error','Nie znaleziono wiadomości o podanym ID');
        }
        if(empty($message)){
            redirect()->back()->flash('blank','Nie znaleziono wiadomości z dzisiaj');
        }
        return view('messages')->with('message' , $message)->with('today','today');
    }

    public function readAll()
    {
        try {
            $message = Message::all();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->flash('error','Nie znaleziono wiadomości o podanym ID');
        }
        if(empty($message)){
            redirect()->back()->flash('blank','Nie znaleziono wiadomości z dzisiaj');
        }
        return view('messages')->with('message' , $message)->with('all','all');
    }


    public function delete($id)
        {
            try {
                $message = Message::findOrFail($id);
                $message->delete();
            } catch (ModelNotFoundException $e) {
                return redirect()->back()->flash('error', 'Nie znaleziono wiadomości o podanym ID');
            }

            return redirect()->back()->flash('success', 'Wiadomość usunięta pomyślnie!');
        }

}
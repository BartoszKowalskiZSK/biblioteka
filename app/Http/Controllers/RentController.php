<?php
namespace App\Http\Controllers;
//do zmiany ---------------------------------------------------------------------------------------
use Illuminate\Http\Request;
use App\Models\Rent;
use Illuminate\Support\Facades\Validator;

class RentController extends Controller
{
    public function store(Request $request)
    {

        $validatedData = Validator::make($request->all(),[
            'user_id' => 'required|integer|exists:users,id',
            'book_id' => 'required|integer|exists:books,id',
            'rent' => 'required|date'
        ]);

        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData->errors())->withInput();
        }

        $due = $request->input('date')->addDays(14);

        $rent = new Rent;

        $rent->user_id = $validatedData['user_id'];
        $rent->book_id = $validatedData['book_id'];
        $rent->rent = $validatedData['rent'];
        $rent->due = $due;

        $rent->save();

        return redirect()->back()->with('success', 'Książka została wypożyczona!');
    }
}

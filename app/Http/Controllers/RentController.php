<?php
namespace App\Http\Controllers;
//do zmiany ---------------------------------------------------------------------------------------
use Illuminate\Http\Request;
use App\Models\Rent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\DatabaseManager;

class RentController extends Controller
{
    public function store($userId, array $bookIds)
    {
        $rents = [];
        foreach ($bookIds as $bookId) {
            $rent = new Rent();
            $rent->user_id = $userId;
            $rent->book_id = $bookId;
            $rent->rent = now();
            $rent->due = now()->addDays(14);
            $rent->completed = false;
            $rent->ended=false;
            $rent->save();

            $rents[] = $rent;
        }

        return redirect()->back()->flash('success','Wypożyczenia zostały dodane');
    }

    public function findRentsOfUser($userId)
    {
        
        $rents = Rent::where('user_id', $userId)
            ->get();

        return $rents;
    }

    public function findRents()
    {
        
        $rents = Rent::where('user_id', Auth()->user()->id)
            ->get();

        return $rents;
    }

    public function softDelete($rentId){
        $rent = Rent::find($rentId);
        $rent->ended=true;;
        $rent->save();
        return redirect()->back()->with('success','Wypożyczenie zostało usunięte');
    }

    public function actualRents(){
    $currentUser = Auth()->user();
    $currentTime = now();

    $unexpiredRents = Rent::where('user_id', $currentUser->id)
        ->where('return_date', '>', $currentTime)
        ->where('returned','!=', true)
        ->get();

        return view('allrents')->with('success', $unexpiredRents);
    }

    public function actualRentsAll(){
        $currentTime = now();
    
        $unexpiredRents = Rent::where('return_date', '>', $currentTime)
            ->where('returned','!=', true)
            ->get();
    
            return view('allrents')->with('success', $unexpiredRents);
        }




}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\throwException;

use App\Models\User;

use App\Models\Book;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $RentController = app(RentController::class);
        $rents = $RentController->actualRents();
        $rents = count($rents);
        $user_id = auth()->user()->id;
        $user = User::where('id',$user_id)->first();
        $user->amount=3-$rents;
        $user->save();

        //TODO zmiana ilości aby dynamicznie dopasowywała się do ilości wypożyczonych książek
        $cart = $request->session()->get('cart',["amount"=>Auth::user()->amount]);
        if($cart["amount"]=0){
            return redirect()->back()->flash('error', 'Limit wypożyczonych książek osiągnięty');
        }
        if (array_key_exists($productId, $cart)){
            return redirect()->back()->flash('error', 'Nie możesz mieć więcej niż 1 sztukę danej książki');
        }else{
            $cart[$productId]=1;
            $cart["amount"]--;
            $request->session()->put('cart',$cart);
            $book = app(BookController::class)->search($productId);
            return view('cart')->with('success', "Książka ". $book->name." została dodana do koszyka");
        }
    }

    public function removeFromCart(Request $request, $productId){
        $cart = $request->session()->get('cart');
        unset($cart[$productId]);
        $cart['amount']--;
        $request->session()->put('cart',$cart);
        $book = app(BookController::class)->search($productId);
        if(count($cart)==0){
            $request->session()->forget('cart');
        }
        return redirect()->back()->with('success',"Książka ". $book->name." została usunięta z koszyka");
    }

    public function showCart(Request $request){
        $cart = $request->session()->get('cart');
        $books=array();
        foreach(array_keys($cart) as $book){
            $books[]= Book::find($book);
        }
        return redirect()->back()->with('success',$books);
    }


    public function rent(Request $request){
        $cart = $request->session()->get('cart');
        $RentController = app(RentController::class);
        $RentController->store(Auth()->user()->id, $cart);
        $count = count($cart);
        $count -=3;
        $user_id = Auth()->user()->id;
        $user = User::where('id', $user_id)->first();
        $user->amount=$count;
        $user->save();
        $request->session()->forget('cart');
        return view('cart')->with('success','Książki zostały wypożyczone');
    }
}
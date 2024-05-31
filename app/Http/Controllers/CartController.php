<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
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
        $user = User::where('id', $user_id)->first();
        $user->amount = 3 - $rents;
        $user->save();

        $cart = json_decode(Cookie::get('cart'), true) ?? ["amount" => $user->amount];
        if ($cart["amount"] <= 0) {
            return redirect()->back()->with('error', 'Limit wypożyczonych książek osiągnięty');
        }
        if (array_key_exists($productId, $cart)) {
            return redirect()->back()->with('error', 'Nie możesz mieć więcej niż 1 sztukę danej książki');
        } else {
            $cart[$productId] = 1;
            $cart["amount"]--;
            Cookie::queue(Cookie::make('cart', json_encode($cart), 60 * 24 * 30));
            $book = app(BookController::class)->search($productId);
            return redirect()->route('cart')->with('success', "Książka " . $book->name . " została dodana do koszyka");
        }
    }

    public function removeFromCart(Request $request, $productId)
    {
        $cart = json_decode(Cookie::get('cart'), true);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            $cart['amount']++;
            Cookie::queue(Cookie::make('cart', json_encode($cart), 60 * 24 * 30));
            $book = app(BookController::class)->search($productId);
            if (count($cart) == 1) {
                Cookie::queue(Cookie::forget('cart'));
            }
            return redirect()->back()->with('success', "Książka " . $book->name . " została usunięta z koszyka");
        }
        return redirect()->back()->with('error', 'Książka nie została znaleziona w koszyku');
    }

    public function showCart(Request $request)
    {
        $cart = json_decode(Cookie::get('cart'), true) ?? ["amount" => 0];
        $books = [];
        if (count($cart) > 1) {
            foreach (array_keys($cart) as $bookId) {
                if ($bookId !== 'amount') {
                    $books[] = Book::find($bookId);
                }
            }
        }
        return view('cart', ['books' => $books]);
    }

    public function rent(Request $request)
    {
        $cart = json_decode(Cookie::get('cart'), true);
        $RentController = app(RentController::class);
        $RentController->store(Auth()->user()->id, $cart);
        $count = count($cart) - 1;
        $user_id = Auth()->user()->id;
        $user = User::where('id', $user_id)->first();
        $user->amount -= $count;
        $user->save();
        Cookie::queue(Cookie::forget('cart'));
        return redirect()->route('cart')->with('success', 'Książki zostały wypożyczone');
    }
}

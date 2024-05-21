<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\throwException;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        //TODO zmiana ilości aby dynamicznie dopasowywała się do ilości wypożyczonych książek
        $cart = $request->session()->get('cart',["amount"=>Auth::user()->amount]);
        if($cart["amount"]=0){
            redirect()->back()->with('error', 'Limit wypożyczonych książek osiągnięty');
        }
        if (array_key_exists($productId, $cart)){
            redirect()->back()->with('error', 'Nie możesz mieć więcej niż 1 sztukę danej książki');
        }else{
            $cart[$productId]=1;
            $cart["amount"]--;
            $request->session()->put('cart',$cart);
            redirect()->back()->with('success', "Sukces"); //TODO Książka xxx zostałą wypożyczona
        }
    }
}

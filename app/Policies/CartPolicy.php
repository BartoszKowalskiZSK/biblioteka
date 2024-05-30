<?php

namespace App\Policies;

use App\Models\User;

class CartPolicy
{
    //removeFromCart, showCart, deletecart
    public function addToCart(){
        if(Auth()->user()->privillages==1){
            return true;
        }else{
            return false;
        }
    }

    public function removeFromCart(){
        if(Auth()->user()->privillages==1){
            return true;
        }else{
            return false;
        }
    }

    public function showCart(){
        if(Auth()->user()->privillages==1){
            return true;
        }else{
            return false;
        }
    }

    public function deleteCart(){
        if(Auth()->user()->privillages==1){
            return true;
        }else{
            return false;
        }
    }


}

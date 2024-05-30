<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Rent;

class RentPolicy
{
    //store, findRentsByUserId, delete
    public function store(Rent $rent)
    {
        if (Auth()->user()->privillages == 5) {
            return true;
        }

        if (Auth()->user()->privillages == 1 && $$rent->user_id == Auth()->user()->id) {
            return true;
        }

        return false;
    }

    public function findRentsByUserId(){
        return Auth()->user()->privillages==1;
    }

    public function findRentsOfUser(){
        return Auth()->user()->privillages==5;
    }

    public function softDelete(){
        return Auth()->user()->privillages==1 || Auth()->user()->privillages==5;
    }
}

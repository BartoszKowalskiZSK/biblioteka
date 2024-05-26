<?php

namespace App\Policies;

use App\Models\User;

class MessagePolicy
{
    //store, read, delete

    public function store(){
        return Auth()->user()->privillages==1;
    }

    public function storeGuest(){
        return Auth()->guest();
    }

    public function read(){
        return Auth()->user()->privillages==5;
    }

    public function delete(){
        return Auth()->user()->privillages==5;
    }
}

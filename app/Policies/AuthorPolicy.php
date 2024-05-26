<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Author;

class AuthorPolicy
{
    //store,update,delete
    public function store(){
        if(Auth()->user()->privillages==5) return true;
        else return false;
    }

    public function update(){
        if(Auth()->user()->privillages==5) return true;
        else return false;
    }

    public function delete(){
        if(Auth()->user()->privillages==5) return true;
        else return false;
    }
}

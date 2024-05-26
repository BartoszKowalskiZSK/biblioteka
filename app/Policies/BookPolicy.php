<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BookPolicy
{
    public function store()
    {
        if(Auth()->user()->privillages==5) return true;
        else return false;
    }

    public function update()
    {
        if(Auth()->user()->privillages==5) return true;
        else return false;
    }

    public function delete()
    {
        if(Auth()->user()->privillages==5) return true;
        else return false;
    }

    public function read()
    {
        return true;
    }
}

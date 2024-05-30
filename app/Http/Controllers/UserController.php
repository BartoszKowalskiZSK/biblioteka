<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function readAll(){
        if(Auth()->user()->privillages==10){
            $users= User::All();
            return view('users')->with('users', $users);
        }else{
            abort(403);
        }
    }

    public function set1($userId){
        if(Auth()->user()->privillages==10){
            $user = User::where('id','==',$userId);
            $user->privillages=1;
            $user->save;
            return redirect()->back()->with('success','Użytkownik zmieniony');
        }else{
            abort(403);
        }
    }

    public function set5($userId){
        if(Auth()->user()->privillages==10){
            $user = User::where('id','==',$userId);
            $user->privillages=5;
            $user->save;
        }else{
            abort(403);
            return redirect()->back()->with('success','Użytkownik zmieniony');
        }
    }

    public function set10($userId){
        if(Auth()->user()->privillages==10){
            $user = User::where('id','==',$userId);
            $user->privillages=10;
            $user->save;
        }else{
            abort(403);
            return redirect()->back()->with('success','Użytkownik zmieniony');
        }
    }
}

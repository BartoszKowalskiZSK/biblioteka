<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class InfoController extends Controller
{
    public function read(){
        try{
            $info = Info::firstorFail();
        }  catch(ModelNotFoundException $e){
            $info = new info;
            $info->nrtel = null;
            $info->email = null;
            $info->adres = null;
            $info->otwarcienormal = null;
            $info->otwarcieweekend = null;
            $info->user_id=null;
            $info->save();
        }
        return view('welcome')->with('info', $info);
    }

    public function edit(Request $request){
        //['user_id','nrtel','email','adres','otwarcienormal','otwarcieweekend']
        try {
            $info = Info::findOrFail(1);
        } catch (ModelNotFoundException $e) {
            // tutaj obsłuż wyjątek, np. zwróć komunikat o błędzie
            $info = new info;
            $info->nrtel = $request->input('nrtel');
            $info->email = $request->input('email');
            $info->adres = $request->input('adres');
            $info->otwarcienormal = $request->input('otwarcienormal');
            $info->otwarcieweekend = $request->input('otwarcieweekend');
            $info->user_id=Auth()->user()->id;
            $info->save();
        }
       
        $info->user_id=Auth()->user()->id;
        $nn=false;
        if($request->input('nrtel')){
            $info->nrtel = $request->input('nrtel');
            $nn=true;
        }else{
            $info->nrtel = $info->nrtel;
        }

        if($request->input('email')){
            $info->email = $request->input('email');
            $nn=true;
        }else{
            $info->email = $info->email;
        }

        if($request->input('adres')){
            $info->adres = $request->input('adres');
            $nn=true;
        }else{
            $info->adres = $info->adres;
        }

        if($request->input('otwarcienormal')){
            $info->otwarcienormal = $request->input('otwarcienormal');
            $nn=true;
        }else{
            $info->otwarcienormal = $info->otwarcienormal;
        }

        if($request->input('otwarcieweekend')){
            $info->otwarcieweekend = $request->input('otwarcieweekend');
            $nn=true;
        }else{
            $info->otwarcieweekend = $info->otwarcieweekend;
        }

        $info->user_id=Auth()->user()->id;
        $info->save();
        return redirect()->route('/');
    }
}

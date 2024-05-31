<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InfoController extends Controller
{
    public function read(){
        $info = Info::first();
        return view('welcome')->with('info', $info);
    }

    public function edit(Request $request){
        //['user_id','nrtel','email','adres','otwarcienormal','otwarcieweekend']
        $info = Info::find(1);
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
    }
}

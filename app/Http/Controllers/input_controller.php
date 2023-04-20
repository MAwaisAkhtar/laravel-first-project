<?php

namespace App\Http\Controllers;

use App\Models\login;
use Illuminate\Http\Request;

class input_controller extends Controller
{
    //

    function input(){

       return view('input');
    }

    function output(Request $request){
        $email=$request->input('email');
        $pass=$request->input('pass');
        // $r=$request->all();

        login::create([
            'email'=>$email,
            'password' => $pass,
        ]);
       
       return view('home');
    }

}

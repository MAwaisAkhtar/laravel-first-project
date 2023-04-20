<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class new_contr extends Controller
{
    //
    function showmsg($id){
        // echo "show message";
      return  view('contact',['name'=>$id]);
    }
}

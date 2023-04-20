<?php

namespace App\Http\Controllers;

use App\Models\signup;
// use App\Notifications\new_notification;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

// use Illuminate\Support\Facades\Session as FacadesSession;

class login_controller extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function show(Request $request)
    {
        $email=$request->input('login_email');
        $pass=$request->input('login_pass');
        
        $fetch=signup::where('Email',$email)->where('verified',1)->get();
        //     return 'pass match';exit;
        // }

        // print_r($fetch);exit;
        // $request->session()->put('fetch',$fetch);
        // return $fetch;
        // $request->session()->flush();
        foreach ($fetch as $key => $value) {
        if ($fetch && Hash::check($pass,$value->Password)) {

            $id=$value['id'];
            $name=$value['Name'];
            $request->session()->put('id',$id);
            $request->session()->put('name',$name);
            // return $request->session()->get('id');
            // return view('login.dashboard');
            // return redirect('/dashboard');exit();
            // $message=signup::paginate(1);
            // session()->put('msg',$message);
            return redirect('/dashboard');
        }
        }
            // return "Invalid Email or Invalid Password";
            // return "Incorrect Email or Password";
            $inc='Invalid Email or Password';
            session()->flash('inc',$inc);
            return redirect('/login');
            // return view('login')->with('msg',$msg);

        // return to_route('login', ['msg' => $msg]);
            
        // if ($fetch==true) {
        // //     // return view('dashboard');
        // //     // return view('login.dashboard');
        // return 'welcome';

        // }
        
    }
    public function upd(Request $request)
    {
        // $id_s=session()->get('id_s');
        // return $id_s;exit();
        $upd=signup::findOrFail($request->id);
        // return $upd->verified;exit;
        if ($upd->verified==0) {
         
        $t=$request->token;
        $tok=signup::where('token',$t)->get();

        // return $upd;exit;
        // $dt=$upd->token;
        foreach ($tok as $value) {
        //    return $value->created_at;exit;
        if (!$tok || $value->created_at->diffInMinutes(now()) > 1) {

            $upd->delete();
            return 'your link is expire Please signup again';
        
    //    $upd->email_verified_at = now();


        // echo $upd->Email;exit;
        // $noti=signup::first();
        // return $noti;exit;

       

        // dd($dd);exit;
       
    //    $upd->email_verified_at = now();
       

    }else {

        $upd->update([
            'verified' => 1,
            'email_verified_at' => now()
       ]);
       Notification::send($upd,new WelcomeNotification);


        $suc='Your Account has been verified successfully';
       session()->flash('suc',$suc);

       return redirect('/login');
    
        }
    }
}else{
    session()->flash('ver','You are already verified');
    return redirect('/login');
}

    

    }

    public function des()
    {
        Session::flush();
        return redirect('/login');
    }
}
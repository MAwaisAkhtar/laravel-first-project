<?php

namespace App\Http\Controllers;

use App\Models\login;
use App\Models\signup;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class signup_contr extends Controller
{
    public $name;
    public $email;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.signup');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:25',   
            'email' => 'required|unique:signups,Email|max:25',   //unique identifies the similar email
            // 'unique' => 'The email address has already been taken.',
            'pass' => 'required|max:25',    
            'r_pass' => 'required|max:25|same:pass',    
        ]);
        // $randomLink = Str::random(40);
        // $link = url('/login') . '/' . $randomLink;
        // return $link;exit();


        $name=$request->input('name');
        $this->name=$name;
        $email=$request->input('email');
        $this->email=$email;
        $pass=$request->input('pass');
        $r_pass=$request->input('r_pass');
        $product=signup::create([
            'Name' => $name,
            'Email' => $email,
            'Password' => Hash::make($pass),
            'R_Password' => $r_pass,
            'token' => Str::random(50),
            // 'email_verified_at' => now()
        ]);

        $id=signup::where('Email',$this->email)->get();
        foreach ($id as $key => $value) {
            $id_s=$value['id'];
            $request->session()->put('id_s',$id_s);

        $verificationUrl = URL::temporarySignedRoute(
            'signup_email', Carbon::now()->addMinutes(1), [ 'id' => $value['id'], 'token' => $value['token']]
        );
    }
        // session()->flash('verificationUrl',$verificationUrl);

        Mail::send('emails.signup_email',[$product->toarray(), 'verificationUrl' => $verificationUrl],
        function($msg){
            $msg->to($this->email,$this->name)->subject('Verification');
        });


        $succ='Check Your Email to get verified';
       session()->flash('succ',$succ);
        return redirect('/signup');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $id=signup::where('Email',$this->email)->get();
        // foreach ($id as $key => $value) {
        //     return $value['id'];exit();
        // }

        // $id_s=$id['id'];
        // return $id_s;exit();
        // session()->put('id_s',$id_s);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    //     $id_s=$request()->session()->get('id_s');
    //     $upd=signup::findOrFail($id_s);
    //     $upd->update([
    //         'verified' => 1
    //    ]);
    //    return redirect('/login');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

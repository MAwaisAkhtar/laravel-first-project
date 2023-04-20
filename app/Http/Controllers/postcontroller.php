<?php

namespace App\Http\Controllers;

use App\Models\login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class postcontroller extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $p=login::all();
    //    login::paginate(5);     //it will paginate //per page 5 // use it in your blase file{{ posts->render()(same as posts->link()) }}
    //    return $this->create();
       return view('input',compact('p'));
        // return "welcome from index method";
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('input');
        return "atiq";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|max:25'    //server side validation
        ]);
        $email=$request->input('email');
        $pass=$request->input('pass');
        // $r=$request->all();
        // login::create($request->all());
        login::create([
            'email'=>$email,
            'password' => $pass,  //3840358702781 ATHAWAN 3520214213784
        ]);
        // $done="inserted";
        // dd('values are saved');
        // $request->session()->put('alert-success',$email); //flash set session only once and then destroyed successfully //request is a object and it will take less memory
        // Session::put('key',$email);  //put set session //it will take memory more
        // Session::forget('key');  //unset session
        // Session::flush(); //all sessions destroy
        if (Session::has('alert-success')) { //it checks that session is set or not ,,, has=get
            return "session set";exit;
        }
        return "Data Inserted Successfully";
        // return view('input',compact('p'));
    }

    /**
     * Display the specified resource.
     */

    public function show()
    {
        // return $prod;
    //    return view('home');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $login=login::findOrFail(22);
        return view('input', compact('login'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        // $p=login::where('id',22)->get();
        $upd=login::findOrFail(26);
        // $upd=login::where('id',22)->get();
        // return $upd;exit;
       $upd->update([
            'email' => 'awai@gmail.com'
       ]);
       return "Updated Successfully";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $del=login::find(25);
        // $del=login::where('id',23)->get();
        if (!$del) {
           return 'Nothing to delete';
        }else {
            $del->delete();
            return 'deleted successfully';
        }
        // return 'deleted successfully';
    }
}
?>
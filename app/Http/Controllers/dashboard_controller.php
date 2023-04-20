<?php

namespace App\Http\Controllers;

use App\Models\signup;
use App\Models\gallery;
use Illuminate\Http\Request;

class dashboard_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ms=signup::paginate(2,['*'],'ms');
        $mss=gallery::paginate(1,['*'],'mss');
        return view('login.dashboard')->with('ms',$ms)->with('mss',$mss);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row=signup::findorfail($id);
        if (!$row) {
           abort(403);
        }
        return view('login.edit')->with('row',$row);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post=signup::find($id);
        $post->update([
            'Name' => $request->login_name,
            'Email' => $request->login_email,
        ]);
        session()->flash('updated','Your post is updated');
        return to_route('dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=signup::findorfail($id);
        $post->delete();
        session()->flash('dlt','Deleted Successfully');
        return to_route('dashboard.index');
    }
}
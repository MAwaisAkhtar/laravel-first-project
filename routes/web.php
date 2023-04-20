<?php

use App\Http\Controllers\dashboard_controller;
use App\Http\Controllers\input_controller;
use App\Http\Controllers\login_contr;
use App\Http\Controllers\login_controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontr;
use App\Http\Controllers\new_contr;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\signup_contr;
use App\Models\login;
use App\Models\product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/{name}', function ($name) {
//     return view('welcome',['name'=>$name]);
    //    redirect('contact')
// });



Route::get('/', function () {
     return view('welcome');
});

Route::get('home/{name}', function ($name) {
    return view('home',['names'=>$name]);
});

Route::get('billing/{name}', function ($name) {
    return view('billing')->with('name',$name);
});

Route::get('contact/{name}', function ($name) {
    return view('contact',compact('name'));
});

// Route::view('home/{id}','home',['names'=>$id]);

Route::view('contact','contact');
// Route::view('input', 'input');
Route::view('master','layout.master');
Route::view('billing','billing');
Route::view('if','if');
// Route::view('home','home');


// Route::get('input',[input_controller::class,'input']);
// Route::post('home',[input_controller::class,'output']);

// Route::get('input',[postcontroller::class,'create']);
// Route::post('home',[postcontroller::class,'store']);
// Route::get('home',[postcontroller::class,'show']);
Route::resource('inputs',postcontroller::class);
// Route::get('i',[postcontroller::class,'destroy']);


Route::get("user",[usercontr::class,'show']);
Route::get("contact/{id}",[new_contr::class,'showmsg']);

// Route::resource('photos',postcontroller::class);
// Route::get('/conn',function(){   //to check that db is connected or not
//     try {
//         DB::connection()->getpdo();
//         return "connected";
//     } catch (\Exception $e) {
//         dd($e->getmessage());
//     }
// });

// Route::get('insert', function () {
//     // login::create([
//     //     'email'=>'awaismufti90@gmail.com',
//     //     'password' => '15000',
//     //     // 'amount' => '20000',
//     // ]);
//     $prod=login::where('email','99quran2023@gmail.com');
//     return view('home')->with('prod',$prod) ;
// });
// Route::view('input','input')->name('input');
// Route::view('login','login.login');
Route::resource('signup',signup_contr::class);
Route::view('signup_email','login.login')->name('signup_email');

Route::get('login',[login_controller::class,'index']);
Route::post('logins',[login_controller::class,'show'])->name('logins');
Route::get('v_login',[login_controller::class,'upd'])->name('v_login');
Route::get('signup_email',[login_controller::class,'upd'])->name('signup_email');
// Route::get('signup_email',[signup_contr::class,'store'])->name('signup_email');
Route::get('logout',[login_controller::class,'des']);
// Route::view('dashboard','login.dashboard')->name('dashboard');
Route::resource('dashboard',dashboard_controller::class);
// Route::view('loginn','loginn')->name('loginn')->middleware('routeAgeCheck');

// Route::view('logout','login.logout');


// Route::view('verified','verified');
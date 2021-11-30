<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',function (){
   return view('home');
});

Route::get('/hello',function (){
   return "Hello World";
});

// json response
Route::get('/api-56',function (){
    return ['Name'=>'ali'];
});

Route::get('/api12',function (){
    return view('ab');
});

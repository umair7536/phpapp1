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

Route::get('/laravel', function () {
    return view('welcome');
});

//Route::get('/',function (){
//
//   return view('home');
//});

Route::get('/','pagescontroller@home');
Route::get('/about','pagescontroller@about');
Route::get('/contact','pagescontroller@contact');
Route::get('/blog','pagescontroller@blog');


// contact page route
//Route::get('contact',function (){
//    return view('contact',[
//        'contact'=>file_get_contents(__DIR__.'/../resources/html_pages/contact.html')
//    ]);
//});

// wild card
Route::get('/posts/{post}',function ($slug){
    $path=__DIR__."/../resources/html_pages/{$slug}.html";

    //    if (!file_exists($path)){
//        dd("Not present this link");     // dd (die,dump) to abort the route
//    }

    //  OR

//    if (!file_exists($path)){
//        ddd("Not present this link");     // ddd (die,dump,debug) to abort the route
//    }


    if (!file_exists($path)){
        return redirect('/');     // ddd (die,dump,debug) to abort the route
    }
    $post=cache()->remember("posts.{$slug}",7,function () use ($path){
        $page=file_get_contents($path);
        var_dump("loaded page");
        return $page;
    });

//    ddd($path);
//    if (!file_exists($path)){
//        abort(404);     // dd (die,dump) to abort the route
//    //  abort(503)           // servies unavailbale
//
//    }

//    $page=file_get_contents($path);
//    return $page;

    return $post;

})->where('post','[A-z][0-9]+');




//Route::get('contact',function (){
//    $slag=file_get_contents(__DIR__.'/../resources/html_pages/contact.html');
//    return $slag;
//
//});
//
//
////about page route
//Route::get('about',function (){
//    $slag=file_get_contents(__DIR__.'/../resources/html_pages/about.html');
//    return $slag;
//
//});
//


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


// dynamic routes
Route::get('user/{name}/{id}',function ($name,$id){
//    return "This User Namr is ".$name." and its id is ".$id;
    return "This User Namr is {$name} and its id is {$id}";
});




// this create all routes for the function that present in mention controller
//Route::get('posts','PostsController@index');
//Route::get('posts/create','PostsController@create');
//Route::post('posts/store','PostsController@store');
//Route::get('post/{id}','PostsController@show');
//Route::get('post/{id}/edit','PostsController@edit');
Route::resource('posts','PostsController');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

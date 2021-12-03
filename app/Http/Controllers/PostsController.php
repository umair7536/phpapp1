<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Post::all();                               // get all data from solution
//        return $data;
        $data=Post::where('title','one')->get();          // get specific data from page
        $data=Post::orderBy('title','asc')->get();               // get sort by column
        $data=DB::select("select *from posts where id='1'");     // get data using sql query

//        $data=Post::orderBy('title','asc')->paginate(3);         // pagination one record at one time
        $data=Post::orderBy('id')->paginate(3);

        return view("posts.index")->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.create
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,['title'=>'required' ,'body'=>'required']);

        $post=new Post();
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->save();

        return redirect('/posts')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.view')->with('data',Post::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Post::find($id);
        return view("posts.edit")->with("data",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,['title'=>'required' ,'body'=>'required']);

        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->save();

        return redirect('/posts')->with('success','Post Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Post::find($id);
        $data->delete();
        return redirect('/posts')->with('success','Post Deleted');

    }
}

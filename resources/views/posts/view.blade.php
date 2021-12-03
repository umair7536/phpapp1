<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">

    <div>
        <h1>{{$data->title}}</h1>
        <div>{{$data->body}}</div>
    </div>
    <a class="btn btn-primary" href="/posts/{{$data->id}}/edit">Edit Post</a>
    {{Form::open(['action'=>['PostsController@destroy',$data->id],'method'=>'POST','class'=>'pull-right'])}}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    {{Form::close()}}
    <br>
    <a class="btn btn-primary" href="/posts">Back</a>
</div>


</body>
</html>

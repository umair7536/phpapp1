<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<br>
<div class="container">
    @include('messages')
    <h2>Posts index</h2>

<br/><br/>

<table class="table table-striped">
@if (count($data)>0)
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Post Content</th>
    </tr>
    @foreach ($data as $d)
        <tr>
            <td >{{$d->id}}</td>
            <td><a href="posts/{{$d->id}}">{{$d->title}}</a></td>
{{--            <td>{{$d->body}}</td>                   <!-- to show simple text  -->--}}
            <td>{!!$d->body!!}</td>                   <!-- to show/parse html content  -->
        </tr>
    @endforeach
</table>
    {{$data->links()}}
    @else
    <h4>No Product Found</h4>

    @endif


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

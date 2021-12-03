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
<h2>Contact {{$c}}</h2>
<h4>{{$title}}</h4>
@if (count($courses)>0)
    <ul>
    @foreach($courses as $course)
        <li>{{$course}}</li>
        @endforeach
    </ul>
@endif
</body>
</html>

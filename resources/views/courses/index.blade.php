<html>
    <head></head>
    <body>
        <ul>
            @foreach($courses as $course)
                <li>{{$course->id}}: {{$course->name}}</li>
            @endforeach
        </ul>
    </body>
</html>
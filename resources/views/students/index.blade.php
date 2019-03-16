@extends('sb-admin.layout.layout')
@section('page-content')
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Birth Date</th>
        <th scope="col">Registration Date</th>
    </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
            <tr>
                <th scope="row"><a href="/students/show/{{$student->id}}">{{$student->id}}</a></th>
                <td>{{$student->first_name}}</td>
                <td>{{$student->last_name}}</td>
                <td>{{$student->birth_date}}</td>
                <td>{{$student->created_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
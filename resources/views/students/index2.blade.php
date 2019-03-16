@extends('sb-admin.layout.layout')
@section('page-content')
    <div class="row">
        <form method="get" action="/students/">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">{{trans('student.students')}}</h3>
                <div>
                    <a onclick="function(e){}" id="back_to_home" href="/">Back to home</a>
                </div>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> {{trans('student.filter')}}</button>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr class="filters">
                    <th><input name="id" type="text" class="form-control" placeholder="#" value="{{array_key_exists('id', $query) ? $query['id'] : ''}}"></th>
                    <th><input name="first_name" type="text" class="form-control" placeholder="{{trans('student.first_name')}}" value="{{array_key_exists('first_name', $query) ? $query['first_name'] : ''}}"></th>
                    <th><input name="last_name" type="text" class="form-control" placeholder="{{trans('student.last_name')}}" value="{{array_key_exists('first_name', $query) ? $query['last_name'] : ''}}"></th>
                    <th><div><input name="birth_date" type="date" class="form-control" placeholder="Birth Date" value="{{array_key_exists('birth_date', $query) ? $query['birth_date'] : ''}}"></div></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <th scope="row"><a href="/students/show/{{$student->id}}">{{$student->id}}</a></th>
                            <td>{{$student->first_name}}</td>
                            <td>{{$student->last_name}}</td>
                            <td>{{$student->birth_date}}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        </form>
    </div>
@endsection
@extends('sb-admin.layout.layout')

@section('page-content')
    <h1 class="h3 mb-4 text-gray-800">Student Info</h1>
    <form>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input readonly type="text" class="form-control"
                   aria-describedby="firstNameHelp" value="{{$student->first_name}}">
        </div>

        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input readonly type="text" class="form-control"
                   aria-describedby="lastNameHelp" value="{{ $student->last_name}}">
        </div>

        <div class="form-group">
            <label for="birthDate">Birth Date</label>
            <input readonly type="text" class="form-control"
                   aria-describedby="birthDateHelp" value="{{$student->birth_date}}">
        </div>

        <div class="form-group">
            <label for="birthDate">Registration Date</label>
            <input readonly type="text" class="form-control"
                   aria-describedby="birthDateHelp" value="{{$student->created_at}}">
        </div>

        <a href="{{env('APP_URL')}}/students/edit/{{$student->id}}" class="btn btn-success">Edit</a>
        <a href="{{env('APP_URL')}}/students/delete/{{$student->id}}" class="btn btn-danger">Delete</a>
    </form>
@endsection
@extends('sb-admin.layout.layout')

@section('page-content')
    <h1 class="h3 mb-4 text-gray-800">Create Student</h1>

    <form method="post" action="{{url('/students/save')}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="id" value="{{$student->id}}">
        <div class="form-group">
            <label for="firstName" {{$errors->has('first_name')?"class=text-danger":''}}>First Name</label>
            <input name="first_name" type="text" class="form-control {{$errors->has('first_name') ? 'is-invalid' : ''}}" id="firstName"
                   aria-describedby="firstNameHelp" placeholder="Enter First Name"
                    value="{{$errors->has('first_name') ? old('first_name') : $student->first_name}}">
            @if($errors->has('first_name'))
                <small class="text-danger">{{$errors->first('first_name')}}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input name="last_name" type="text" class="form-control" id="lastName"
                   aria-describedby="lastNameHelp" placeholder="Enter Last Name"
                    value="{{$student->last_name}}">
        </div>

        <div class="form-group">
            <label for="birthDate">Birth Date</label>
            <input name="birth_date" type="date" class="form-control" id="birthDate"
                   aria-describedby="birthDateHelp"
                   value="{{$student->birth_date}}">
        </div>

        <div class="form-group">
            <label for="birthDate">Registration Date</label>
            <input name="birth_date" type="date" class="form-control" id="birthDate"
                   aria-describedby="birthDateHelp"
                   value="{{$student->created_at}}" readonly>
        </div>


        <div class="form-group">
            <label for="birthDate">Courses</label>
            <select multiple class="form-control" name="courses[]">
                @foreach($courses as $course)
                    <option {{isset($selectedCourseIds) AND in_array($course->id, $selectedCourseIds) ? "selected" : ''}} value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
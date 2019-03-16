<?php

namespace App\Http\Controllers;
use App\Events\StudentCreated;
use App\Http\Requests\SaveStudentRequest;
use App\Models\Course;
use App\Models\Student;
use Mail;

/**
 * Created by PhpStorm.
 * User: Ragheb
 * Date: 2019-02-24
 * Time: 1:18 PM
 */
class StudentsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
//        \Log::info("index page");
//        event(new StudentCreated(new Student()));
        $user = new \stdClass();
        $user->email = "ragheb.adel@gmail.com";
        $user->name = "Ragheb Khaseeb";

        Mail::send('emails.user_created', ['user' => $user], function ($m) use ($user){
            $m->from('hello@app.com', 'Your Application');
            $m->to($user->email, $user->name)->subject('No Reply!');
        });



//        $students = Student::get();
        $params = request()->all();

        $students = new Student();

        if(array_key_exists('id', $params) AND $params['id']){
            $students = $students->where('id', '=', $params['id']);
        }

        if(array_key_exists('first_name', $params) AND $params['first_name']){
            $students = $students->where('first_name', 'like', '%'.$params['first_name'].'%');
        }

        if(array_key_exists('last_name', $params) AND $params['last_name']){
            $students = $students->where('last_name', 'like', '%'.$params['last_name'].'%');
        }

        return view('students.index2', ['students'=>$students->get(), 'query'=>$params]);
    }

    public function edit(Student $student){
        $courses = Course::all();
        $selectedCourseIds = $student->courses->pluck('id')->toArray();
//        $courseIds = [];
//        foreach($student->courses as $course){
//            $courseIds[] = $course->id
//        }

        return view('students.edit', ['student'=>$student, 'courses'=>$courses, 'selectedCourseIds'=>$selectedCourseIds]);
    }

    public function show(Student $student){
        return view('students.show', ['student'=>$student]);
    }

    public function courses(Student $student /*Student::find($id)*/){
//        $student = Student::find($id);
        return view('students.courses', ['courses'=>$student->courses]);
    }

    public function create(){
        $courses = Course::all();
        return view('students.edit', ['student'=>new Student(), 'courses'=>$courses]);
    }

    public function delete(Student $student){
        $result = $student->delete();
        return redirect()->route('students-index');
    }

    public function save(SaveStudentRequest $request){
        $params = $request->all();
        $student = null;
        if(array_key_exists('id', $params) AND $params['id']){
            $student = Student::find($params['id']);
        }else{
            $student = new Student();
        }

        $student->first_name = $params['first_name'];
        $student->last_name = $params['last_name'];
        $student->save();

//        DB::table('courses_students')->where('student_id', $student->id)->delete();

        if(array_key_exists('courses', $params) AND is_array($params['courses'])){
            $student->courses()->sync($params['courses']);
        }

        return redirect()->route('students-index');
    }
}
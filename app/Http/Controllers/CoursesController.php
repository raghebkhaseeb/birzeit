<?php
/**
 * Created by PhpStorm.
 * User: Ragheb
 * Date: 2019-03-03
 * Time: 9:52 AM
 */

namespace App\Http\Controllers;


use App\Models\Course;

class CoursesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $course = Course::find(1);
        dd($course->students);
//        return view('courses.index', ['courses'=>$courses]);
    }
}
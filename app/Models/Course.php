<?php
/**
 * Created by PhpStorm.
 * User: Ragheb
 * Date: 2019-03-03
 * Time: 9:47 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = "courses";
    public $timestamps = false;

    public function students(){
        return $this->belongsToMany('App\Models\Student', 'courses_students', 'course_id', 'student_id');
    }
}
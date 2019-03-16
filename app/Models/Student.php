<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Created by PhpStorm.
 * User: Ragheb
 * Date: 2019-02-24
 * Time: 2:37 PM
 */
class Student extends Model
{
    use SoftDeletes;

    protected $table = "students";
    public $timestamps = true;

//    protected $primaryKey = "sid";


    public function courses(){
        return $this->belongsToMany('App\Models\Course', 'courses_students', 'student_id', 'course_id');
    }
}
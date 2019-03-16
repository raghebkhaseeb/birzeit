<?php
/**
 * Created by PhpStorm.
 * User: Ragheb
 * Date: 2019-03-14
 * Time: 3:37 PM
 */

namespace App\Events;


use App\Models\Student;
use Illuminate\Queue\SerializesModels;

class StudentCreated
{
    use SerializesModels;

    public $student;


    public function __construct(Student $student){
        $this->student = $student;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Ragheb
 * Date: 2019-03-14
 * Time: 3:40 PM
 */

namespace App\Listeners;


use App\Events\StudentCreated;
use Illuminate\Support\Facades\Log;

class NewStudentCreatedEmail
{
    public function __construct(){

    }


    public function handle(StudentCreated $event){
        Log::info("student created listener >>>>>>>>>>>>>>>>>>>>>>>>>>   ");
    }
}
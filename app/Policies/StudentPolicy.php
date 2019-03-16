<?php

namespace App\Policies;

use App\User;
use App\Models\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the student.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Student  $student
     * @return mixed
     */
    public function view(User $user, Student $student)
    {
        //
    }

    /**
     * Determine whether the user can create students.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id > 0;
    }

    /**
     * Determine whether the user can update the student.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Student  $student
     * @return mixed
     */
    public function update(User $user, Student $student)
    {
        //
    }

    /**
     * Determine whether the user can delete the student.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Student  $student
     * @return mixed
     */
    public function delete(User $user, Student $student)
    {
        //
    }
}

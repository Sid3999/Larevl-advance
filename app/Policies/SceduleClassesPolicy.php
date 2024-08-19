<?php

namespace App\Policies;

use App\Models\SceduleClasses;
use App\Models\User;

class SceduleClassesPolicy
{
    /**
     * Create a new policy instance.
     */
   
    public function delete(User $user, SceduleClasses $scedule)
        {
             return $user->id === $scedule->instructor_id;
        }
   
}

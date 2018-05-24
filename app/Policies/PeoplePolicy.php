<?php

namespace App\Policies;

use App\Models\User;
use App\Models\People;

class PeoplePolicy extends Policy
{
    public function update(User $user, People $people)
    {
        // return $people->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, People $people)
    {
        return true;
    }
}

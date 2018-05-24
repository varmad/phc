<?php

namespace App\Policies;

use App\Models\User;
use App\Models\NurseCategory;

class NurseCategoryPolicy extends Policy
{
    public function update(User $user, NurseCategory $nurse_category)
    {
        // return $nurse_category->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, NurseCategory $nurse_category)
    {
        return true;
    }
}

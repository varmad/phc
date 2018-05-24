<?php

namespace App\Observers;

use App\Models\People;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class PeopleObserver
{
    public function creating(People $people)
    {
        //
    }

    public function updating(People $people)
    {
        //
    }
}
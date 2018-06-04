<?php

namespace App\Models;

class UserJob extends Model
{
    protected $table = 'user_jobs';


    /**
     * Get the phone record associated with the user.
     */
    public function accepted_users()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the phone record associated with the user.
     */
    public function job()
    {
        return $this->belongsTo('App\Models\Job');
    }

    public function scopeActive($query)
    {
       return $query->where('is_dropout', '!=' ,1);
    }

}

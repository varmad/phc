<?php

namespace App\Models;

class Profile extends Model
{
    protected $table = 'users';

    protected $fillable = ['display_name', 'email', 'mobile', 'username', 'nursing_home_series', 'address'];

    /**
     * Get the jobs for the shift.
     */
    public function jobs()
    {
        return $this->hasMany('App\Model\Job');
    }
}

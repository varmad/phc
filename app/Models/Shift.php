<?php

namespace App\Models;

class Shift extends Model
{
    protected $table = 'shifts';

    protected $fillable = ['name', 'start_time', 'end_time', 'description', 'status'];

    /**
     * Get the jobs for the shift.
     */
    public function jobs()
    {
        return $this->hasMany('App\Model\Job');
    }
}

<?php

namespace App\Models;

class NurseCategory extends Model
{
    protected $table = 'nurse_categories';

    protected $fillable = ['name', 'description', 'is_active', 'created_by', 'updated_by'];

    /**
     * Get the jobs for the nurse category.
     */
    public function jobs()
    {
        return $this->hasMany('App\Model\Job');
    }
}

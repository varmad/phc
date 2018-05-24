<?php

namespace App\Models;

class People extends Model
{
    protected $table = 'peoples';
    
    protected $fillable = ['job_refer_id', 'nursing_id', 'staff_count', 'staff_cat_id', 'shift_id'];
}

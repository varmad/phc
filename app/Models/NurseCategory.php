<?php

namespace App\Models;

class NurseCategory extends Model
{
    protected $table = 'nurse_categories';
    
    protected $fillable = ['name', 'description', 'is_active', 'created_by', 'updated_by'];
}

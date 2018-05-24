<?php

namespace App\Models;

class TeritoryPage extends Model
{
    protected $table = 'teritory_pages';

    protected $fillable = ['name', 'slug', 'description', 'status', 'created_by', 'updated_by'];


}

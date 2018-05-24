<?php

namespace App\Models;

class Shift extends Model
{
    protected $table = 'shifts';

    protected $fillable = ['name', 'start_time', 'end_time', 'description', 'status'];
}

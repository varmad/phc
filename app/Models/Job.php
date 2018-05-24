<?php

namespace App\Models;
use Carbon\Carbon;

class Job extends Model
{
    protected $table = 'jobs';

    protected $fillable = [
      'job_reference_id',
      'nursing_id',
      'staff_count',
      'nurse_category_id',
      'shift_id',
      'start_date',
      'end_date',
      'description',
      'status'
    ];


    /**
     * Get the phone record associated with the user.
     */
    public function shift()
    {
        return $this->belongsTo('App\Models\Shift');
    }

    /**
     * Get the phone record associated with the user.
     */
    public function nurse_category()
    {
        return $this->belongsTo('App\Models\NurseCategory');
    }

    /**
     * Get the phone record associated with the user.
     */
    public function nursing()
    {
        return $this->belongsTo('App\User');
    }


    public function setStartDateAttribute($date)
    {
        $start_date = Carbon::createFromFormat('d/m/Y', $date);
        $this->attributes['start_date'] = Carbon::parse($start_date)->format('Y-m-d');
    }

    public function setEndDateAttribute($date)
    {
        $end_date = Carbon::createFromFormat('d/m/Y', $date);
        $this->attributes['end_date'] = Carbon::parse($end_date)->format('Y-m-d');
    }

    public function getStartDateAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public function getEndDateAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }



}

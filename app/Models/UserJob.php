<?php

namespace App\Models;
use DB;

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


    public function getAcceptedJobs($user) {
      //DB::raw("CONCAT(users.display_name,'<br>',shifts.name, '<br>', shifts.start_time, 'To', shifts.end_time) as title
      $results = DB::table('user_jobs')
              ->join('users', 'users.id', '=', 'user_jobs.user_id')
              ->join('jobs', 'jobs.id', '=', 'user_jobs.job_id')
              ->join('shifts', 'shifts.id', '=', 'jobs.shift_id')
              ->where('users.id', '=', $user->id)
              ->select(DB::raw("CONCAT(shifts.start_time, ' To ', shifts.end_time) as shift_time, users.display_name AS title,
              shifts.name AS shift_name, jobs.start_date As start, jobs.end_date AS end, users.address AS description"))
              ->get();


      return $results;
    }

}

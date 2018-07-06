<?php

namespace App\Models;
use Carbon\Carbon;
use App\Models\Traits\HasLocalDates;
use App\Models\Traits\PhcDate;
use App\Models\UserJob;

class Job extends Model
{
    use HasLocalDates, PhcDate;

    protected $table = 'jobs';
    protected $tomorrow_date	= 'DATE(NOW())';

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


    /**
     * Get the phone record associated with the user.
     */
    public function user_jobs()
    {
        return $this->hasMany('App\Models\UserJob');
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

    // public function getStartDateAttribute($date)
    // {
    //     return Carbon::parse($date)->format('d/m/Y');
    // }

    // public function getEndDateAttribute($date)
    // {
    //     return Carbon::parse($date)->format('d/m/Y');
    // }

    public function getActiveDateAttribute()
    {
        $date = Carbon::now()->tomorrow();

        return Carbon::parse($date)->format('d/m/Y');
    }


    public function scopeActive($query)
    {
       return $query->where('status', 'Active');
    }

    public function scopeNotDeleted($query)
    {
       return $query->where('is_deleted', '=', 0);
    }

    public function scopeBetweenCurrentDate($query)
    {
       return $query->whereRaw("start_date > ".$this->tomorrow_date);
    }

    public function scopeRecentCreated($query)
    {
       return $query->orderBy("created_at", "DESC");
    }

    public function scopeOfCategory($query, $category)
    {
        return $query->where('nurse_category_id', $category);
    }

    public function localDate($date) {
      return $this->localize($date);
    }

    public function dateFromDateTime($date_time){
      return $date_time->toDateString();
    }

    public function getTodayDate() {
      return $this->dateFromDateTime($this->localDate(Carbon::now()));
    }

    public function canAccesptShift($given_date_time, $current_date_time){
      // $given_date_time = '2018-06-03 17:17:10';
      $date_one = Carbon::parse($current_date_time);
      $date_two = Carbon::parse($given_date_time);
      // echo "Current ".$date_one;
      // echo "<br>";
      // echo "Given ".$date_two;
      // echo "<br>";
      $minutes = $date_two->diffInMinutes($date_one) ;

      // echo $minutes;exit;
      if (Carbon::parse($date_two)->gt($date_one) && $minutes > 180) {
        return true;
      } elseif(Carbon::parse($date_two)->gt($date_one) && $minutes > 720){
        return true;
      } else {
        return false;
      }
    }

    public function is_eligible_to_accept($job, $user) {
      // should not have active shift
      //$user_job = UserJob
      // $today_date = $this->dateFromDateTime($this->localDate(Carbon::now()));
      $today_date = $job->start_date;

      // $user_job = UserJob::where('shift_date', $today_date)->where('user_id', $user->id)->where('job_id', $job->id)->get();
      $user_job = UserJob::where('user_id', $user->id)->where('is_deleted', 0)->orderBy('shift_date', 'DESC')->first();
      
      if($user_job) {
        $last_shift_end_date_time = $user_job->shift_date." ".$user_job->shift_end_time;
        $job_start_date_time = $job->start_date." ".$job->shift->start_time;

        $can_accespet = $this->canAccesptShift($job_start_date_time, $last_shift_end_date_time);
        if ($can_accespet) {
          return $job->start_date;
        }else{
          return false;
        }
      } else {
        $user_job = UserJob::where('shift_date', $job->start_date)->where('user_id', $user->id)->where('job_id', $job->id)->get();
        // should be 12hr gap between shift to shift
        // should be greater than current time + 3 hours and
        // $shift_date_time = $this->getTodayDate().' '.$job->shift->start_time;
        if(count($user_job) > 0) {
          return false;
        } else {
          $shift_date_time = $job->start_date.' '.$job->shift->start_time;
          $current_date_time = Carbon::parse($this->localDate(Carbon::now()));

          $can_accespet = $this->canAccesptShift($shift_date_time, $current_date_time);
          if ($can_accespet) {
            return $today_date;
          }else{
            return false;
          }
        }

      }

    }

    public function getShowAcceptButton($job, $user){
      $today_date = $this->dateFromDateTime($this->localDate(Carbon::now()));

      $user_job = UserJob::where('user_id', $user->id)->where('job_id', $job->id)->get();
      if(count($user_job) > 0) {
          if($user_job[0]->is_deleted == 1) {
            return 'dropout';
          } else {
            return 'accepted';
          }

      } else {
        return 'can_accept';
      }
    }


    public function getActiveJobShifts($user) {

      $jobs = self::with('nursing', 'nurse_category', 'shift')
              ->ofCategory($user->nurse_category_id)
              ->active()
              ->notDeleted()
              ->betweenCurrentDate()
              ->get();

      return $jobs;
    }




}

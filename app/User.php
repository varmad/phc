<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $tomorrow_date	= 'DATE(NOW())';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the jobs for the user.
     */

    public function jobs()
    {
        return $this->hasMany('App\Models\Job', 'nursing_id');
    }

    public function active_jobs() {

      return $this->jobs()->where('status', 'Active')->orderBy('jobs.start_date', 'desc');

    }

    public function accepted_jobs()
    {
        return $this->hasMany('App\Models\UserJob', 'user_id')->whereNull('is_dropout')->whereRaw("shift_date >= ".$this->tomorrow_date);
    }

    public function getLastLoginAttribute($date)
    {
        return Carbon::parse($date)->format('F d, y h:i A');
    }
}

<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Clickatell\Rest;
use Clickatell\ClickatellException;
use Auth;
use \App\Models\UserJob;

class CalenderController extends Controller
{
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware(function($request, $next){
          $this->user = Auth::user();

          return $next($request);
        });

    }

    public function index()
    {
        $user = $this->user;
        $user_jobs = $this->user->accepted_jobs;
        $job = new UserJob;
        $user_accepted_jobs = $job->getAcceptedJobs($this->user);
        $user_jobs_json = $user_accepted_jobs->toJson();
        //
        // echo "<pre>";
        // print_r($user_jobs_json);
        // exit;

        return view('site.calenders.index', compact('user', 'user_jobs_json'));
    }
}

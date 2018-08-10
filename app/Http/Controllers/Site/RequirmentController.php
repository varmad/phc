<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Auth;
use App\User;
use App\Models\NurseCategory;
use App\Models\Shift;
use App\Models\Job;
use App\Http\Requests\Site\ProfileRequest;
use App\Http\Requests\Site\JobRequest;
use App\Mail\JobCreated;
use Illuminate\Support\Facades\Mail;
use App\Services\ClickatellService;

class RequirmentController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $user_profile = $this->user;
      $jobs = $this->user->active_jobs;
      $user = $this->user;
      // $jobs = Job::where('status', 'Active')
      return view('site.requirments.index', compact('jobs', 'user'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $nursing_categories = NurseCategory::where('is_active', '1')->pluck('name', 'id')->prepend('Please Select','');
      $shifts = Shift::where('status', 'Active')->pluck('name', 'id')->prepend('Please Select','');

      return view('site.requirments.create', compact('nursing_categories', 'shifts'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {



      $job = new Job;
      $shift_date = $job->is_eligible_to_create_shift(Input::all());

      if(!$shift_date) {
        return redirect()->route('requirment.create')->withErrors(__('Sorry you are not allowed to create job.'));
      }

      $job->job_reference_id = generate_random_string();
      $job->nursing_id = $this->user->id;
      $job->staff_count = Input::get('staff_count');
      $job->nurse_category_id = Input::get('nurse_category_id');
      $job->shift_id = Input::get('shift_id');
      $job->start_date = Input::get('start_date');
      $job->end_date = Input::get('end_date');
      $job->description = Input::get('description');
      $job->booking_reference = Input::get('booking_reference');
      $job->status = 'Active';
      $job->created_by = $this->user->id;
      $job->updated_by = $this->user->id;

      $job->save();

      #Notify email to all nurses
      #get all users belongs to category
      $nurses = User::where('nurse_category_id', $job->nurse_category_id)->pluck('email');
      if(count($nurses) > 0) {
        foreach($nurses AS $nurse) {
          Mail::to($nurse)->send(new JobCreated($job, $this->user));


          $clickatell = new ClickatellService();
          // +919177541077
          $sms_text = "Hello Sham, \n\rNew job has been posted for ".$job->nurse_category->name. "\r\nNursing Home: ".$this->user->display_name."\r\nShift Time:".$job->shift->name." ".$job->shift->start_time." ".$job->shift->end_time."\r\nShift Duration:".$job->start_date." to ".$job->end_date;
          $clickatell->sendSms('+919177541077', $sms_text);
          $clickatell->sendSms('00447862948713', $sms_text);

        }
      }


      return redirect()->route('requirment.create')->withSuccess(__('Job created successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
      $user_profile = $this->user;
      return view('site.profiles.edit', compact('user_profile'));
    }

}

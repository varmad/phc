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
use App\Models\UserJob;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobAccepted;
use App\Mail\JobDroped;
use App\Services\ClickatellService;

class ShiftController extends Controller
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
      $job = new Job;
      $jobs = $job->getActiveJobShifts($this->user);

      $user = $this->user;
      // $jobs = Job::where('status', 'Active')
      return view('site.shifts.index', compact('jobs', 'user'));
    }

    public function accept(Request $request)
    {
      $request->validate([
            'job_reference_id' => 'required'
      ]);

      $job = Job::where('job_reference_id', Input::get('job_reference_id'))->first();
      if($job) {
        $job_object = new Job;
        $shift_date = $job_object->is_eligible_to_accept($job, $this->user);

        if($shift_date) {
          $user_job = new UserJob;
          $user_job->user_id = $this->user->id;
          $user_job->shift_date = $shift_date;
          $user_job->job_id = $job->id;
          $user_job->shift_start_time = $job->shift->start_time;
          $user_job->shift_end_time = $job->shift->end_time;
          $user_job->created_by = $this->user->id;
          $user_job->updated_by = $this->user->id;
          // $user_job->is_dropout = null;
          // $user_job->is_deleted = '0';


          $user_job->save();

           Mail::to($job->nursing->email)->send(new JobAccepted($job));

           $clickatell = new ClickatellService();
           // +919177541077
           $sms_text = "Hello PHC, \n\rStaff has been accepted for ".$job->nurse_category->name. "\r\nName OF the Nurse: ".$this->user->display_name."\r\nJob ID:".$this->user->display_name." Shift Time: ".$job->shift->start_time." ".$job->shift->end_time."\r\nDate by:".$job->start_date;
           $clickatell->sendSms('+919177541077', $sms_text);
           $clickatell->sendSms('+447862948713', $sms_text);
           $clickatell->sendSms('+447703361786', $sms_text);


          return redirect()->route('shift-list.index')->withSuccess(__('Shift accespted successfully.'));
        } else {
          return redirect()->route('shift-list.index')->withErrors(__('Sorry you couldn\'t able to accespt this Job.'));
        }
      } else {
        return redirect()->route('shift-list.index')->withErrors(__('Job not found in the database.'));
      }

    }


    public function dropout(Request $request) {

        $user_jobs = $this->user->accepted_jobs;
        // print_r($user_jobs);
        // exit;
        $user = $this->user;
        // $jobs = Job::where('status', 'Active')
        return view('site.shifts.dropouts', compact('user_jobs', 'user'));
    }


    public function acceptDropout(Request $request) {

        if(Input::get("drop_reason_".$request->uj_id."_text")) {
          $user_job = UserJob::find($request->uj_id);
          if($user_job) {
            $job = Job::find($user_job->job_id);

            $user_job->is_dropout = 1;
            $user_job->droupout_reason = Input::get("drop_reason_".$request->uj_id."_text");
            $user_job->is_deleted = 1;
            $user_job->save();

            Mail::to($job->nursing->email)->send(new JobDroped($job, $user_job));

            return redirect()->route('shift.dropout')->withSuccess(__('See you soon!!'));
          }

        } else {
          return redirect()->route('shift.dropout')->withErrors(__('Dropout reason is required.'));
        }


    }


    public function acceptedList(Request $request) {

        $job = Job::where('job_reference_id', $request->job_reference_id)->first();
        $shift_accepted_list = $job->user_jobs->where('is_dropout', '!=', '1')->where('is_deleted', '!=', '1');
        $user = $this->user;
        // $jobs = Job::where('status', 'Active')
        return view('site.shifts.accepted_list', compact('shift_accepted_list', 'user', 'job'));
    }

}

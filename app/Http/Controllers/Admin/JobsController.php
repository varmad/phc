<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// use Illuminate\View\View;
// use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\JobRequest;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\NurseCategory;
use App\Models\Shift;
use App\User;
use Yajra\Datatables\Datatables;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $jobs = Job::paginate();

      return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $job_reference_id = generate_random_string();
      $nursing_homes = User::role('nursing')->pluck('name', 'id')->prepend('Please Select','');
      $nursing_categories = NurseCategory::where('is_active', '1')->pluck('name', 'id')->prepend('Please Select','');
      $shifts = Shift::where('status', 'Active')->pluck('name', 'id')->prepend('Please Select','');

      return view('admin.jobs.create', compact('job_reference_id', 'nursing_homes', 'nursing_categories', 'shifts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
      $job_reference_id = $job->job_reference_id;
      $nursing_homes = User::role('nursing')->pluck('name', 'id')->prepend('Please Select','');
      $nursing_categories = NurseCategory::where('is_active', '1')->pluck('name', 'id')->prepend('Please Select','');
      $shifts = Shift::where('status', 'Active')->pluck('name', 'id')->prepend('Please Select','');

      return view('admin.jobs.edit', compact('job','job_reference_id', 'nursing_homes', 'nursing_categories', 'shifts'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {

      $job = Job::create($request->only([
        'job_reference_id',
        'nursing_id',
        'staff_count',
        'nurse_category_id',
        'shift_id',
        'start_date',
        'end_date',
        'description',
        'status'
      ]));

      return redirect()->route('jobs.index', $job)->withSuccess(__('Job created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
      return view('admin.jobs.show', compact('job'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, Job $job)
    {
      $job->update($request->only([
        'job_reference_id',
        'nursing_id',
        'staff_count',
        'nurse_category_id',
        'shift_id',
        'start_date',
        'end_date',
        'description',
        'status'
      ]));

      return redirect()->route('jobs.edit', $job)->withSuccess(__('Job updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job  $job)
    {
      $job->delete();
      return redirect()->route('jobs.index')->withSuccess(__('Job deleted.'));
    }

    public function getListData()
    {
      $jobs = Job::with('shift', 'nurse_category', 'nursing');
      // $jobs = Job::select(['id', 'job_reference_id' ,'start_date', 'end_date', 'description', 'status'])->get();

      return Datatables::of($jobs)
          ->addColumn('action', function($job){
            return view('admin.jobs._actions', compact('job'));
          })
          ->editColumn('shift_time', function($job){
            return $job->shift->name."(".$job->shift->start_time."- ".$job->shift->end_time.")";
          })
          ->editColumn('id', '{{$id}}')
          ->make(true);
    }
}

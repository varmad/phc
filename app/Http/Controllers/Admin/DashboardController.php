<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Shift;
use App\User;

class DashboardController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      //
      $jobs = Job::count();
      $shifts = Shift::count();
      $users = User::count();

      return view('admin/dashboard/index', compact('jobs', 'shifts', 'users'));
  }
}

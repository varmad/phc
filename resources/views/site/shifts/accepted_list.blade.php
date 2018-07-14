<?php use App\User; ?>
@extends('layouts.dashboard')

@section('content')
<div class="staff_new_requirment_wrap">

  <h1 class="page-header">Shift Accepted</h1>
  <!-- <div class="searchShifts">
    <form action="http://local.phc.com/job/show/mzb95i95" class="form-horizontal" autocomplete="off" method="post" accept-charset="utf-8">
      <ul class="shift_accept_ul">

        <li>Shift title</li>
        <li>
        <select>
        <option>select all</option>
        <option value="1531526400">2018-07-14</option>
        </select>
        </li>

        <li>Date Range</li>
        <li>
          <select name="post_date" id="post_date">
            <option value="">select all</option>
            <option value="1531526400" selected="selected">2018-07-14</option>
          </select>
        </li>
        <li><input name="search" type="submit" value="Search" class="btn primary"></li>
      </ul>
    </form>
  </div> -->

  <div class="clear"></div>
  <h3 class="shift_title">Shift Title: OR</h3>

  <!-- <a href="http://local.phc.com/job/staff_callender">View in callender format</a> -->
  @if(count($shift_accepted_list) > 0)
    @foreach($shift_accepted_list AS $accepted_list)
    <?php $user = User::find($accepted_list->user_id); ?>
    <div class="profile_wrap_color">
      <ul>
        <li>Name OF the Nurse : {{$user->display_name}}</li>
        <li>Job ID : {{$job->job_reference_id}}</li>
        <li>Shift Time : {{$job->shift->start_time}} to {{$job->shift->end_time}} </li>
        <li>Date by: {{$job->start_date}}</li>
        <li style="border-bottom:0px solid #fff;">No of Staff : {{$job->staff_count}}</li>
        <!--<li style="border-bottom:0px solid #fff;">Description : asdsd</li>-->
      </ul>

      @if($user->profile_picture && isset($user))
      <div class="profile_img"><img src="{{asset('storage/profile_picture/'.$user->profile_picture)}}" width="180" height="250" alt="Staff Picture"></div>
      @else
      <div class="profile_img"><img src="http://local.phc.com/assets/images/nurse-pic.png" width="90" height="118" alt="Staff Picture"></div>
      @endif
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
    @endforeach
  @endif
</div>
@endsection

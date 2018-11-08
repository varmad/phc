<?php use App\User; ?>
@extends('layouts.admin')

@section('content')

<section class="content">
  <h2 class="page-header">Shift Accepted List</h2>
  <div class="row">

    @if(count($shift_accepted_list) > 0)
      @foreach($shift_accepted_list AS $accepted_list)
      <?php $user = User::find($accepted_list->user_id); ?>
      <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user-2">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-aqua-active">

            @if($user->profile_picture && isset($user))
            <div class="widget-user-image">
              <img src="{{asset('storage/profile_picture/'.$user->profile_picture)}}" alt="User Avatar">
            </div>
            @else
            <div class="widget-user-image">
              <img src="http://local.phc.com/assets/images/nurse-pic.png" alt="Staff Picture">
            </div>
            @endif
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username">{{$user->display_name}}</h3>
            <h5 class="widget-user-desc">Job id: {{$job->job_reference_id}}</h5>
          </div>
          <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
              <li><a href="#">Shift Title  <span class="pull-right">{{$job->nurse_category->name}} </span></a></li>
              <li><a href="#">Shift Time  <span class="pull-right">{{$job->shift->start_time}} to {{$job->shift->end_time}} </span></a></li>
              <li><a href="#">Date by <span class="pull-right">{{$job->start_date}}</span></a></li>
              <li><a href="#">No of Staff <span class="pull-right badge bg-green">{{$job->staff_count}}</span></a></li>
            </ul>
          </div>
        </div>
        <!-- /.widget-user -->
      </div>
      @endforeach
    @endif
  </div>
</section>
@endsection

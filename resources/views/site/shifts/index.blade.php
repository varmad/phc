@extends('layouts.dashboard')

@section('content')
<h1 class="page-header">View Requirement</h1>

<div class="staff_new_requirment_wrap">
  @include('common.alerts')

  @if(count($jobs) > 0)
  <?php $i=1; ?>
  @foreach($jobs AS $job)
  <?php $div_class = ($i%2 == '0') ? 'new_requirment_right' : 'new_requirment_left';  ?>
  <div class="{{$div_class}}" style="padding-top:5px;">
    <h3 class="shift_title">Shift Title : {{$job->nurse_category->name}} <span class="pull-right span2">{{$job->start_date}}</span></h3>
    <ul>
      <li>Nursing Home : {{$user->display_name}}</li>
      <li>Booking Reference : {{$job->booking_reference}}</li>
      <li>Location : {{$user->address}}</li>
      <li>Shift Time : {{$job->shift->start_time}} to {{$job->shift->end_time}}</li>
      <li>Shift Duration : {{$job->start_date}} | {{$job->end_date}}</li>
      <li>No of Staff : {{$job->staff_count}}</li>
      <li style="border-bottom:0px;">Description : {{$job->description}}</li>
      <li>Localize : {{$job->localDate($job->created_at)}}</li>
    </ul>

    @if($job->getShowAcceptButton($job, $user))
    {!! Form::open(['route' => ['shift.accept'], 'method' =>'POST', 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}
    <input type="hidden" name='job_reference_id' value="{{$job->job_reference_id}}">
    <div class="staff_buttons">
      <ul>
        <li>
          <!-- <a href="#">Accept</a> -->
            {!! Form::submit('Accept', ['class' => 'btn btn-primary']) !!}
        </li>
      </ul>
    </div>
    {!! Form::close() !!}
    @else
    <div class="staff_buttons">
      <ul>
        <li>
          You have Accepted for the day!
        </li>
      </ul>
    </div>
    @endif
    <div class="clear"></div>
  </div>
  <?php $i++; ?>
  @endforeach
  @endif

  <!-- <div class="new_requirment_right">
    <h3 class="shift_title">Shift Title : OR</h3>
    <ul>
      <li>Nursing Home : varma</li>
      <li>Booking Reference : asdasdasd</li>
      <li>Location : Flat no 204, Sri Saahiti Enclave, Near Heritage fresh
      Secretariat Colony, Manikonda</li>
      <li>Shift Time : Long day shift  "08:00 am" to "08:00 pm" </li>
      <li>Shift Duration : 27-05-2018 | 27-05-2018</li>
      <li>No of Staff : 11</li>
      <li style="border-bottom:0px;">Description : 1w1w1w1w</li>
    </ul>

    <div class="staff_buttons">
      <ul>
        <li><a href="http://local.phc.com/job/show/z10nw29f10">view</a></li>
      </ul>

    </div>
    <div class="clear"></div>
  </div> -->


  <div class="clear"></div>
</div>
@endsection

@extends('layouts.dashboard')

@section('content')

<section id="new_requirement">

    <h1 class="page-header">New Requirement</h1>

<div class="dashboard_profile_form_wrap clearfix new_requirement">

  {!! Form::open(['route' => ['requirment.store'], 'method' =>'POST', 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}

  <ul class="profile_data clearfix">
    <li>@include('common.alerts')</li>
  <li class="">
    <div class="control-group">
      <label class="control-label" for="staff_cat_id">Staff Category<span class="required">*</span></label>
      <div class="controls">
        {!! Form::select('nurse_category_id', $nursing_categories, null, ['class' => 'form-control' . ($errors->has('nurse_category_id') ? ' is-invalid' : ''), 'required']) !!}

        @if ($errors->has('nurse_category_id'))
            <span class="invalid-feedback">{{ $errors->first('nurse_category_id') }}</span>
        @endif
      </div>
    </div>
  </li>
  <li class="">
    <label for="staff_count" class="control-label">Number of Staff<span class="required">*</span></label>
    <div class="controls">
      {!! Form::text('staff_count', null, ['placeholder'=>'Number of Staff','class' => 'form-control' . ($errors->has('staff_count') ? ' is-invalid' : '')]) !!}

      @if ($errors->has('staff_count'))
          <span class="invalid-feedback">{{ $errors->first('staff_count') }}</span>
      @endif
    </div>
  </li>


  <li class="">
    <div class="control-group">
      <label class="control-label" for="shift_id">Shift<span class="required">*</span></label>
      <div class="controls">
        {!! Form::select('shift_id', $shifts, null, ['class' => 'form-control' . ($errors->has('shift_id') ? ' is-invalid' : ''), 'required']) !!}

        @if ($errors->has('shift_id'))
            <span class="invalid-feedback">{{ $errors->first('shift_id') }}</span>
        @endif
      </div>
    </div>
  </li>

  <li class="">
    <label for="start_date" class="control-label">Start date<span class="required">*</span></label>
    <div class="controls">
      {!! Form::text('start_date', null, ['placeholder' => 'Start Date','id'=>'start_date','class' => 'form-control' . ($errors->has('start_date') ? ' is-invalid' : '')]) !!}

      @if ($errors->has('start_date'))
          <span class="invalid-feedback">{{ $errors->first('start_date') }}</span>
      @endif

    </div>
  </li>
  <li class="">
    <label for="end_date" class="control-label">End Date<span class="required">*</span></label>
    <div class="controls">
      {!! Form::text('end_date', null, ['placeholder' => 'End Date','id'=>'end_date','class' => 'form-control' . ($errors->has('end_date') ? ' is-invalid' : '')]) !!}

      @if ($errors->has('end_date'))
          <span class="invalid-feedback">{{ $errors->first('end_date') }}</span>
      @endif

    </div>
  </li>
  <li class="">
    <label for="job_desc" class="control-label">Job Description</label>
    <div class="controls">
      {!! Form::textarea('description', null, ['placeholder' => 'Job Description','size' => '80x5', 'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : '')]) !!}

      @if ($errors->has('description'))
          <span class="invalid-feedback">{{ $errors->first('description') }}</span>
      @endif
    </div>
  </li>
  <li class="">
    <label for="booking_reference" class="control-label">Booking Reference</label>
    <div class="controls">
      {!! Form::text('booking_reference', null, ['placeholder'=>'Booking Reference','class' => 'form-control' . ($errors->has('booking_reference') ? ' is-invalid' : '')]) !!}

      @if ($errors->has('booking_reference'))
          <span class="invalid-feedback">{{ $errors->first('booking_reference') }}</span>
      @endif
    </div>
  </li>

  </ul>


    <div class="buttons">
      {!! Form::submit('Save Requirement', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
  </div>

<div class="dashboard_profile_pic"><img src="http://local.phc.com/assets/profile_picture/profile_pic1525499464.jpg" height="220" alt="Nursing Home Pic"></div>


</section>
@endsection

@push('inline-scripts')
<script>
jQuery( document ).ready(function( $ ) {
  $('#start_date').datepicker({
      autoclose: true,
      startDate: '-0d',
      todayHighlight: true,
      format: 'dd/mm/yyyy'
  }).on('changeDate', dateChanged);

  $('#end_date').datepicker({
    autoclose: true,
    startDate: '-0d',
    todayHighlight: true,
    format: 'dd/mm/yyyy'
  });

  function dateChanged(ev) {
    $('#end_date').val($('#start_date').val());
  }
});
</script>
@endpush

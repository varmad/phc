
<!-- <div class="form-group">
    {!! Form::label('Job Reference ID', __('Job Reference ID')) !!}
    {!! Form::text('job_reference_id', $job_reference_id, ['readonly' => 'readonly', 'class' => 'form-control' . ($errors->has('job_reference_id') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('job_reference_id'))
        <span class="invalid-feedback">{{ $errors->first('job_reference_id') }}</span>
    @endif
</div> -->
<div class="form-group">
    {!! Form::label('Nurseing Homes', 'Nurseing Homes') !!}
    {!! Form::select('nursing_id', $nursing_homes, null, ['class' => 'form-control' . ($errors->has('nursing_id') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('nursing_id'))
        <span class="invalid-feedback">{{ $errors->first('nursing_id') }}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('Number of Staff', __('Number of Staff')) !!}
    {!! Form::text('staff_count', null, ['class' => 'form-control' . ($errors->has('staff_count') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('staff_count'))
        <span class="invalid-feedback">{{ $errors->first('staff_count') }}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('Staff Category', 'Staff Category') !!}
    {!! Form::select('nurse_category_id', $nursing_categories, null, ['class' => 'form-control' . ($errors->has('nurse_category_id') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('nurse_category_id'))
        <span class="invalid-feedback">{{ $errors->first('nurse_category_id') }}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('Shifts', 'Shifts') !!}
    {!! Form::select('shift_id', $shifts, null, ['class' => 'form-control' . ($errors->has('shift_id') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('shift_id'))
        <span class="invalid-feedback">{{ $errors->first('shift_id') }}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('Start Date', __('Start Date')) !!}
    {!! Form::text('start_date', null, ['id'=>'start_date','class' => 'form-control' . ($errors->has('start_date') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('start_date'))
        <span class="invalid-feedback">{{ $errors->first('start_date') }}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('End Date', __('End Date')) !!}
    {!! Form::text('end_date', null, ['id'=>'end_date','class' => 'form-control' . ($errors->has('end_date') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('end_date'))
        <span class="invalid-feedback">{{ $errors->first('end_date') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('Job Description', __('Job Description')) !!}
    {!! Form::textarea('description', null, ['size' => '30x5', 'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('description'))
        <span class="invalid-feedback">{{ $errors->first('description') }}</span>
    @endif
</div>


<div class="form-group">
    {!! Form::label('Active', 'Active') !!}

    @if(isset($job))
    <input type="hidden" name="status" value="{{$job->status}}" id="job_is_active_val">
    <input type="checkbox" class="form-check-input" id="job_is_active" @if($job->status != 'Deactive') checked="checked" @endif >
    @else
    <input type="hidden" name="status" value="Active" id="job_is_active_val">
    <input type="checkbox" class="form-check-input" id="job_is_active" checked="checked">
    @endif

    @if ($errors->has('status'))
        <span class="invalid-feedback">{{ $errors->first('status') }}</span>
    @endif
</div>


@push('inline-scripts')
<script>
$( "#job_is_active" ).click(function() {
	if($('#job_is_active').is(':checked')) {
		$('#job_is_active_val').val('Active');
	} else {
		$('#job_is_active_val').val('Deactive');
	}
});

$(function () {
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


<div class="form-group">
    {!! Form::label('Name', __('Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('name'))
        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('Start time', __('Start time')) !!}
    {!! Form::text('start_time', null, ['class' => 'timepicker form-control' . ($errors->has('start_time') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('start_time'))
        <span class="invalid-feedback">{{ $errors->first('start_time') }}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('End time', __('Start time')) !!}
    {!! Form::text('end_time', null, ['class' => 'timepicker form-control' . ($errors->has('end_time') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('end_time'))
        <span class="invalid-feedback">{{ $errors->first('end_time') }}</span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('Description', __('Description')) !!}
    {!! Form::textarea('description', null, ['size' => '30x5', 'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('description'))
        <span class="invalid-feedback">{{ $errors->first('description') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('Active', 'Active') !!}

    @if(isset($shift))
    <input type="hidden" name="status" value="{{$shift->status}}" id="shift_is_active_val">
    <input type="checkbox" class="form-check-input" id="shift_is_active" @if($shift->status != 'Deactive') checked="checked" @endif >
    @else
    <input type="hidden" name="status" value="Active" id="shift_is_active_val">
    <input type="checkbox" class="form-check-input" id="shift_is_active" checked="checked">
    @endif

    @if ($errors->has('status'))
        <span class="invalid-feedback">{{ $errors->first('status') }}</span>
    @endif
</div>


@push('inline-scripts')
<script>
$( "#shift_is_active" ).click(function() {
	if($('#shift_is_active').is(':checked')) {
		$('#shift_is_active_val').val('Active');
	} else {
		$('#shift_is_active_val').val('Deactive');
	}
});

$(function () {
  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false,
    showMeridian: false,
    showSeconds: true
  })
});
</script>
@endpush

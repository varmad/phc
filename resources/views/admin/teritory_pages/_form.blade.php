
<div class="form-group">
    {!! Form::label('Name', __('Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('name'))
        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('Content', __('Content')) !!}
    {!! Form::textarea('description', null, [ 'id'=>'description', 'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('description'))
        <span class="invalid-feedback">{{ $errors->first('description') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('Active', 'Active') !!}

    @if(isset($teritory_page))
    <input type="hidden" name="status" value="{{$teritory_page->status}}" id="teritory_page_is_active_val">
    <input type="checkbox" class="form-check-input" id="teritory_page_is_active" @if($teritory_page->status != 'Deactive') checked="checked" @endif >
    @else
    <input type="hidden" name="status" value="Active" id="teritory_page_is_active_val">
    <input type="checkbox" class="form-check-input" id="teritory_page_is_active" checked="checked">
    @endif

    @if ($errors->has('status'))
        <span class="invalid-feedback">{{ $errors->first('status') }}</span>
    @endif
</div>


@push('inline-scripts')
<script>
$( "#teritory_page_is_active" ).click(function() {
	if($('#teritory_page_is_active').is(':checked')) {
		$('#teritory_page_is_active_val').val('Active');
	} else {
		$('#teritory_page_is_active_val').val('Deactive');
	}
});

$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('description')

  })
</script>
@endpush

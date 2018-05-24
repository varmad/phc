
<div class="form-group">
    {!! Form::label('Name', __('nurse_categories.attributes.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('name'))
        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('Description', __('nurse_categories.attributes.description')) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('description'))
        <span class="invalid-feedback">{{ $errors->first('description') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('Active', 'Active') !!}

    @if(isset($nurse_category))
    <input type="hidden" name="is_active" value="{{$nurse_category->is_active}}" id="nurse_category_is_active_val">
    <input type="checkbox" class="form-check-input" id="nurse_category_is_active" @if($nurse_category->is_active != 0) checked="checked" @endif >
    @else
    <input type="hidden" name="is_active" value="1" id="nurse_category_is_active_val">
    <input type="checkbox" class="form-check-input" id="nurse_category_is_active" checked="checked">
    @endif

    @if ($errors->has('description'))
        <span class="invalid-feedback">{{ $errors->first('description') }}</span>
    @endif
</div>

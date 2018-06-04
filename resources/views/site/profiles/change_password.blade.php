@extends('layouts.dashboard')

@section('content')
<h1>Change Password!</h1>
<div class="change_password_wrap_bg clearfix">
@include('common.alerts')
{!! Form::open(['route' => ['profile.change-password-store'], 'method' =>'POST', 'class' => '', 'autocomplete' => 'off']) !!}

<div class="control-group">

    <div class="controls">
      <input placeholder="New Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

      @if ($errors->has('password'))
          <span class="invalid-feedback">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif

    </div>
</div>
<div class="control-group">
    <div class="controls">
        <input placeholder="Retype New Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

            </div>
</div>
<div class="control-group">
    <div class="controls">
    <input type="submit" name="save" class="btn btn-primary" value="Save User">
    </div>
</div>

</div>
{!! Form::close() !!}
@endsection

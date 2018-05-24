@extends('layouts.app')

@section('content')
<div id="login" class="login_form clearfix">

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="control-group">
      <div class="controls">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="E-Mail">
      </div>
      @if ($errors->has('email'))
          <span class="invalid-feedback">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
      @endif
    </div>

    <div class="control-group">
      <div class="controls">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
      </div>
      @if ($errors->has('password'))
          <span class="invalid-feedback">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif
    </div>


    <div class="pull-left">
  		<div class="controls">
  			<label class="checkbox" for="remember_me">
  				<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
  				<span class="inline-help">Remember me</span>
  			</label>

      	<span class="forgot_pass">
          <a class="" href="{{ route('password.request') }}">
              {{ __('Forgot Your Password?') }}
          </a>
        </span>
  		</div>
		</div>

    <div class="control-group">
			<div class="controls">
				<input class="btn btn-primary" type="submit" name="log-me-in" id="submit" value="Sign In" tabindex="5" />
			</div>
		</div>

  </form>

</div>
@endsection

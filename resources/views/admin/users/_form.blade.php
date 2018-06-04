<?php
  // echo old('role_id');exit;
  if (old('role_id')) {
    if(old('role_id') == '2') {
      $staff_display = 1;
      $nurse_display = 0;
    }else{
      $staff_display = 0;
      $nurse_display = 1;
    }
  }else{
    if( isset($user) && $user->hasRole('staff')) {
      $staff_display = 1;
      $nurse_display = 0;
    }else{
      $staff_display = 0;
      $nurse_display = 1;
    }
  }

?>
<input type="hidden" name="timezone" id="user_tz">
<h3><i class="fa fa-user"> </i> Account Details</h3> <hr />
<div class="form-group">
    {!! Form::label('Email', 'Email') !!}
    {!! Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('email'))
        <span class="invalid-feedback">{{ $errors->first('email') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('Display Name', 'Display Name') !!}
    {!! Form::text('display_name', null, ['class' => 'form-control' . ($errors->has('display_name') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('display_name'))
        <span class="invalid-feedback">{{ $errors->first('display_name') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('PHC Service Reg No', 'PHC Service Reg No') !!}
    {!! Form::text('username', $username, ['class' => 'form-control' . ($errors->has('username') ? ' is-invalid' : ''), 'readonly' => 'readonly']) !!}

    @if ($errors->has('username'))
        <span class="invalid-feedback">{{ $errors->first('username') }}</span>
    @endif
</div>

@if (isset($user))
<div class="form-group">
    {!! Form::label('Password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('password'))
        <span class="invalid-feedback">{{ $errors->first('password') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('Confirm Password', 'Confirm Password') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control' . ($errors->has('password_confirmation') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('password_confirmation'))
        <span class="invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
    @endif
</div>
@endif



<h3><i class="fa fa-universal-access"></i> Role</h3> <hr />
<div class="form-group">
    {!! Form::label('Roles', 'Roles') !!}
    {!! Form::select('role_id', $roles, null, ['id' => 'role_id','class' => 'form-control' . ($errors->has('role_id') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('role_id'))
        <span class="invalid-feedback">{{ $errors->first('role_id') }}</span>
    @endif
</div>



@if (isset($user))
<div class="user-role-staff" style=" {{ ( $staff_display ) ? 'display: block' : 'display:none' }}" >
  <h3><i class="fa fa-user-md"></i> Nurse Categories</h3> <hr />
  <div class="form-group">
      {!! Form::label('Nurse Categories', 'Nurse Categories') !!}
      {!! Form::select('nurse_category_id', $nurse_categories, null, ['id' => 'nurse_category_id','class' => 'form-control' . ($errors->has('nurse_category_id') ? ' is-invalid' : ''), 'required']) !!}

      @if ($errors->has('nurse_category_id'))
          <span class="invalid-feedback">{{ $errors->first('nurse_category_id') }}</span>
      @endif
  </div>
</div>

<div class="user-role-nursing" style=" {{ ( $nurse_display ) ? 'display: block' : 'display:none' }}">
  <h3><i class="fa fa-user-md"></i>  Nursing Home</h3> <hr />
  <div class="form-group">
      {!! Form::label('PHC Series No', 'PHC Series No') !!}
      {!! Form::text('nursing_home_series', null, ['id' => 'nursing_home_series','class' => 'form-control' . ($errors->has('nursing_home_series') ? ' is-invalid' : '')]) !!}

      @if ($errors->has('nursing_home_series'))
          <span class="invalid-feedback">{{ $errors->first('nursing_home_series') }}</span>
      @endif
  </div>
</div>
@endif

<h3><i class="fa fa-user"> </i> Profile Details</h3> <hr />
<div class="form-group">
    {!! Form::label('Mobile', 'Mobile') !!}
    {!! Form::text('mobile', null, ['class' => 'form-control' . ($errors->has('mobile') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('username'))
        <span class="invalid-feedback">{{ $errors->first('mobile') }}</span>
    @endif
</div>


<div class="form-group">
    {!! Form::label('Address', 'Address') !!}
    {!! Form::textarea('address', null, ['size' => '30x5', 'class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('address'))
        <span class="invalid-feedback">{{ $errors->first('address') }}</span>
    @endif
</div>

@if (isset($user))
<div class="form-group">
    {!! Form::label('ID Proof', 'ID Proof') !!}
    {!! Form::text('id_proof', null, ['class' => 'form-control' . ($errors->has('id_proof') ? ' is-invalid' : '')]) !!}

    @if ($errors->has('username'))
        <span class="invalid-feedback">{{ $errors->first('id_proof') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::label('Upload ID proof copy', 'Upload ID proof copy') !!}
    <input type="file" class="form-control-file" name="upload_id_proof" id="upload_id_proof" aria-describedby="fileHelp">

    @if ($errors->has('upload_id_proof'))
        <span class="invalid-feedback">{{ $errors->first('upload_id_proof') }}</span>
    @endif
</div>

@endif

@push('inline-scripts')
<script>
$(function () {
  $("#role_id").change(function(){
    var role_id = this.value;

    if (role_id == '2') {
      //staff
      $(".user-role-staff").show();
      $(".user-role-nursing").hide();

    } else if(role_id == '3') {
      //nursing
      $(".user-role-staff").hide();
      $(".user-role-nursing").show();
    }

  })
});

$(function () {
    // guess user timezone
    $('#user_tz').val(moment.tz.guess())
})
</script>

@endpush

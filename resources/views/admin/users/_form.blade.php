
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
    {!! Form::select('role_id', $roles, null, ['class' => 'form-control' . ($errors->has('role_id') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('role_id'))
        <span class="invalid-feedback">{{ $errors->first('role_id') }}</span>
    @endif
</div>

@if (isset($user))
<h3><i class="fa fa-user-md"></i> Nurse Categories</h3> <hr />
<div class="form-group">
    {!! Form::label('Nurse Categories', 'Nurse Categories') !!}
    {!! Form::select('nurse_category_id', $nurse_categories, null, ['class' => 'form-control' . ($errors->has('nurse_category_id') ? ' is-invalid' : ''), 'required']) !!}

    @if ($errors->has('nurse_category_id'))
        <span class="invalid-feedback">{{ $errors->first('nurse_category_id') }}</span>
    @endif
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

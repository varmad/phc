@extends('layouts.dashboard')

@section('content')
<section id="profile">
  <h1 class="page-header">Edit Profile</h1>

  <div class="row-fluid">
    <div class="span12 clearfix">
      <div class="dashboard_profile_form_wrap clearfix">
        {!! Form::model($user_profile,['route' => ['profile.update', $user_profile], 'method' =>'PUT', 'class' => 'form-horizontal']) !!}
          <ul class="profile_data clearfix">
            <li class="">
              <label class="control-label" for="display_name">Nursing Home <span class="required">*</span></label>
              <div class="span6">
              {!! Form::text('display_name', null, ['class' => '' . ($errors->has('display_name') ? ' is-invalid' : '')]) !!}
              @if ($errors->has('display_name'))
                <span class="invalid-feedback">{{ $errors->first('display_name') }}</span>
              @endif
              </div>

            </li>
            <li class="">
              <label for="mobile" class="control-label">Mobile<span class="required">*</span></label>
              <div class="span6">
                {!! Form::text('mobile', null, ['class' => '' . ($errors->has('mobile') ? ' is-invalid' : '')]) !!}
                @if ($errors->has('mobile'))
                  <span class="invalid-feedback">{{ $errors->first('mobile') }}</span>
                @endif
              </div>
            </li>
            <li class="">
              <label for="address" class="control-label">Address<span class="required">*</span></label>
              <div class="span6">
                {!! Form::textarea('address', null, ['size' => '80x5', 'class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : '')]) !!}

                @if ($errors->has('address'))
                    <span class="invalid-feedback">{{ $errors->first('address') }}</span>
                @endif
              </div>
            </li>
          </ul>
          <div class="buttons">
            {{ link_to_route('profile.index', 'Cancel', [], ['class' => 'btn btn-secondary']) }} or
            {!! Form::submit('Save User', ['class' => 'btn btn-primary']) !!}

          </div>
        {!! Form::close() !!}
      </div>



      <div class="dashboard_profile_pic">
        @if($user_profile->profile_picture && isset($user_profile))
        <img src="{{asset('storage/profile_picture/'.$user_profile->profile_picture)}}" height="220" alt="Nursing Home Pic">
        @else
        <img src="http://local.phc.com/assets/profile_picture/profile_pic1525499464.jpg" height="220" alt="Nursing Home Pic">
        @endif
      </div>
      <div class="dashboard_profile_pic clearfix">
        {!! Form::open(['route' => ['profile.picture'], 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
          <ul class="">

            <li class="" style="list-style:none; text-align:left">
              <div class="span6">
                <input id="profile_picture" type="file" name="profile_picture" maxlength="255" value="">
                @if ($errors->has('profile_picture'))
                    <span class="invalid-feedback">{{ $errors->first('profile_picture') }}</span>
                @endif
              </div>
            </li>
            <li>
              {!! Form::submit('Upload Profile Pic', ['class' => 'btn btn-primary', 'style' => 'margin-top:10px;float:none; width:100%;']) !!}
            </li>
          </ul>
        {!! Form::close() !!}
      </div>
      <div class="clear"></div>

    </div>
  </div>
</section>
@endsection

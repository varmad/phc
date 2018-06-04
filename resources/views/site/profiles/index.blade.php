@extends('layouts.dashboard')

@hasrole('staff')
<?php
  $name = 'Name ';
  $profile_pic = 'assets/images/staff_pic.png';
  $username = 'Staff Id';
?>
@else
<?php
  $name = 'Nursing Home ';
  $profile_pic = 'assets/images/nursing_home_pic.png';
  $username = 'PHC Service Reg No';
?>
@endhasrole


@section('content')
<h1>Profile</h1>
<div class="dashboard_profile_form_wrap">
  <ul class="profile_data">
    <li><?php echo $name;?>: {{$user_profile->display_name}}</li>
    <li>Email : {{$user_profile->email}}</li>
    <li>Mobile No : {{$user_profile->mobile}}</li>
    <li><?php echo $username; ?> : {{$user_profile->username}}</li>

    @hasrole('nursing')
    <li>PHC Series No : {{$user_profile->nursing_home_series}}</li>
    @else
    <li>ID Proof : {{$user_profile->id_proof}}</li>
    @endhasrole

    <li>Address : {{$user_profile->address}}<br />
    <br />
    <br />
    </li>
  </ul>
  <div class="buttons">
    <ul>
      <li><a href="{{route('profile.edit')}}">Edit</a></li>
    </ul>
  </div>
  <div class="clear"></div>
</div>


<div class="dashboard_profile_pic">
  @if($user_profile->profile_picture && isset($user_profile))
  <img src="{{asset('storage/profile_picture/'.$user_profile->profile_picture)}}" height="220" alt="Nursing Home Pic">
  @else
  <img src="http://local.phc.com/assets/profile_picture/profile_pic1525499464.jpg" height="220" alt="Nursing Home Pic">
  @endif
</div>
@hasrole('nursing')
<!-- <div class="dashboard_profile_pic">
  <a href="#" target="_blank"><img src="" width="45" height="47" alt="Nursing Home Pic" /></a>
</div> -->
@endhasrole

<div class="clear"></div>
</div>

@endsection

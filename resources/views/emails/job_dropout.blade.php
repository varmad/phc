
<p>Staff has been dropped for {{$job->nurse_category->name}}. </p>
<ul>

<li>Name OF the Nurse : <?php echo $user->display_name?> </li>
<li>Job ID : <?php echo $user->display_name?></li>
<li>Shift Time : {{$job->shift->start_time}} to {{$job->shift->end_time}} </li>
<li>Date by: {{$job->start_date}}</li>

<?php if(!empty($user_job->droupout_reason)){ ?>
<li style="border-bottom:0px solid #fff;">Drop out Reason : <?php echo $user_job->droupout_reason;?></li>
<?php }?>

</ul>
<?php

if( $user->profile_picture !='' ){
    $profile_pic = '/profile_picture/'.$user->profile_picture;
}else{
  $profile_pic = '/images/nurse-pic.png';
}

?>

<div class="profile_img"><img src="{{url('/')}}{{$profile_pic}}" width="90" height="118"  alt="Staff Picture" /></div>



<p>Thank you</p>

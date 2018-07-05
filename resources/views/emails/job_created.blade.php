<p>New job has been posted for {{$job->nurse_category->name}}. </p>

<p><a href="{{url('/')}}">{{url('/')}}</a></p>



<ul>
<li>Nursing Home : {{$user->display_name}}</li>
<li>Booking Reference : {{$job->booking_reference}}</li>

<li>Location : {{$user->address}}</li>
<li>Shift Time : {{$job->shift->name}} {{$job->shift->start_time}} to {{$job->shift->end_time}}</li>

<li>Shift Duration : {{$job->start_date}}  | {{$job->end_date}}</li>
<li >No of staff : {{$job->staff_count}}</li>
<li style="border-bottom:0px;">Description : <?php echo $job->description;?></li>
</ul>


<p>Thank you</p>
<p>PHC</p>

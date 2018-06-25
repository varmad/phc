@extends('layouts.dashboard')

@section('content')
<h1 class="page-header">My Shifts</h1>

<div class="col-md-12">
    <div class="box box-primary">
      <div class="box-body no-padding">
        <div id="calendar"></div>
      </div>
    <!-- /. box -->
  </div>
</div>
@endsection

@push('inline-scripts')
<script>
jQuery( document ).ready(function( $ ) {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: new Date(),
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      eventRender: function(event, element) {
        element.qtip({
          content: event.shift_name+"<br /><br />"+event.shift_time+"<br /><br />"+event.description
        });
      },

      events: <?php echo $user_jobs_json;  ?>

    });

  });

</script>
@endpush

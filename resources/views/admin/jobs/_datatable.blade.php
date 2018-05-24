<div class="panel-body">
  @if($jobs->count())
  <table class="table table-striped table-bordered dt-responsive" style="width:100%" id="jobs-table">
      <thead>
          <tr>
              <th>Job Reference ID</th>
              <th>Nursing Home</th>
              <th>Number of Staff</th>
              <th>Staff Category</th>
              <th>Shift</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Description</th>
              <th>Status</th>
              <th>Actions</th>

          </tr>
      </thead>
  </table>
  @else
    <h3 class="text-center alert alert-info">Empty!</h3>
  @endif
</div>

@push('inline-scripts')
<script>
$(function() {
    $('#jobs-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route("admin.jobs-data") !!}',
        columns: [
            { data: 'job_reference_id', name: 'job_reference_id' },
            { data: 'nursing.display_name', name: 'nursing.display_name' },
            { data: 'staff_count', name: 'staff_count' },
            { data: 'nurse_category.name', name: 'nurse_category.name' },
            { data: 'shift_time', name: 'shift_time', searchable: false },
            { data: 'start_date', name: 'start_date' },
            { data: 'end_date', name: 'end_date' },
            { data: 'description', name: 'description' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush

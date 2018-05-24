<div class="panel-body">
  @if($shifts->count())
  <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" id="shifts-table">
      <thead>
          <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Start Time</th>
              <th>End Time</th>
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
    $('#shifts-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route("admin.shifts-data") !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'start_time', name: 'start_time' },
            { data: 'end_time', name: 'end_time' },
            { data: 'description', name: 'description' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush

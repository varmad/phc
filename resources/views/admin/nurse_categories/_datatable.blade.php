<div class="panel-body">
  @if($nurse_categories->count())
  <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" id="nurse-categories-table">
      <thead>
          <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Description</th>
              <th>Active</th>
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
    $('#nurse-categories-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route("admin.nurse-categories-data") !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
            { data: 'is_active', name: 'is_active' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush

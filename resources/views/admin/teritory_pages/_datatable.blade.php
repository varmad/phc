<div class="panel-body">
  @if($teritory_pages->count())
  <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" id="teritory-pages-table">
      <thead>
          <tr>
              <th>Id</th>
              <th>Name</th>
              <th>URL</th>
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
    $('#teritory-pages-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route("admin.teritory-pages-data") !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'slug', name: 'slug' },
            { data: 'description', name: 'description' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush

<div class="panel-body">
  @if($users->count())
  <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" id="nurse-categories-table">
      <thead>
          <tr>
              <th>Id</th>
              <th>PHC Service Reg No</th>
              <th>Display Name</th>
              <th>Email</th>
              <th>User Role</th>
              <th>Last Login</th>
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
    $('#nurse-categories-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route("admin.users-data") !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'username', name: 'username' },
            { data: 'display_name', name: 'display_name' },
            { data: 'email', name: 'email' },
            { data: 'role', name: 'role' },
            { data: 'last_login', name: 'last_login' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush

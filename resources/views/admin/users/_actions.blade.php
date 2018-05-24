
<div class="pull-right" style="padding:2px;">
  {!! Form::model($user, ['method' => 'DELETE', 'route' => ['users.destroy', $user], 'class' => 'form-inline', 'data-confirm' => __('forms.users.delete')]) !!}
      {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'name' => 'submit', 'type' => 'submit', 'id' => 'testing-confirm']) !!}
  {!! Form::close() !!}
</div>
<div class="pull-right" style="padding:2px;">
  <a href="{{ route('users.edit', $user) }}" class="btn btn-primary btn-sm">
      <i class="fa fa-pencil" aria-hidden="true"></i>
  </a>
</div>

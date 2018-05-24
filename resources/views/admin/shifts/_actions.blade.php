
<div class="pull-right" style="padding:2px;">
  {!! Form::model($shift, ['method' => 'DELETE', 'route' => ['shifts.destroy', $shift], 'class' => 'form-inline', 'data-confirm' => __('forms.shifts.delete')]) !!}
      {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'name' => 'submit', 'type' => 'submit', 'id' => 'testing-confirm']) !!}
  {!! Form::close() !!}
</div>
<div class="pull-right" style="padding:2px;">
  <a href="{{ route('shifts.edit', $shift) }}" class="btn btn-primary btn-sm">
      <i class="fa fa-pencil" aria-hidden="true"></i>
  </a>
</div>

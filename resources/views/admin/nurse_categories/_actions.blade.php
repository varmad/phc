
<div class="pull-right" style="padding:2px;">
  {!! Form::model($nurse_category, ['method' => 'DELETE', 'route' => ['nurse-categories.destroy', $nurse_category], 'class' => 'form-inline', 'data-confirm' => __('forms.nurse_categories.delete')]) !!}
      {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'name' => 'submit', 'type' => 'submit', 'id' => 'testing-confirm']) !!}
  {!! Form::close() !!}
</div>
<div class="pull-right" style="padding:2px;">
  <a href="{{ route('nurse-categories.edit', $nurse_category) }}" class="btn btn-primary btn-sm">
      <i class="fa fa-pencil" aria-hidden="true"></i>
  </a>
</div>


<div class="pull-right" style="padding:2px;">
  {!! Form::model($teritory_page, ['method' => 'DELETE', 'route' => ['teritory-pages.destroy', $teritory_page], 'class' => 'form-inline', 'data-confirm' => __('forms.teritory-pages.delete')]) !!}
      {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'name' => 'submit', 'type' => 'submit', 'id' => 'testing-confirm']) !!}
  {!! Form::close() !!}
</div>
<div class="pull-right" style="padding:2px;">
  <a href="{{ route('teritory-pages.edit', $teritory_page) }}" class="btn btn-primary btn-sm">
      <i class="fa fa-pencil" aria-hidden="true"></i>
  </a>
</div>

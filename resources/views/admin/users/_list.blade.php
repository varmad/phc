<div class="panel-body">
  @if($nurse_categories->count())
  <table class="table table-striped table-sm table-responsive-md">
      <caption>{{ trans_choice('nurse_categories.count', $nurse_categories->total()) }}</caption>
      <thead>
          <tr>
              <th>@lang('nurse_categories.attributes.name')</th>
              <th>@lang('nurse_categories.attributes.description')</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
          @foreach($nurse_categories as $nurse_category)
              <tr>
                  <td>{{ $nurse_category->name }}</td>
                  <td>{{ $nurse_category->description }}</td>

                  <td>
                    <div class="pull-right" style="padding:2px;">
                      {!! Form::model($nurse_category, ['method' => 'DELETE', 'route' => ['nurse-categories.destroy', $nurse_category], 'class' => 'form-inline', 'data-confirm' => __('forms.nurse_categories.delete')]) !!}
                          {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'name' => 'submit', 'type' => 'submit']) !!}
                      {!! Form::close() !!}
                    </div>
                    <div class="pull-right" style="padding:2px;">
                      <a href="{{ route('nurse-categories.edit', $nurse_category) }}" class="btn btn-primary btn-sm">
                          <i class="fa fa-pencil" aria-hidden="true"></i>
                      </a>
                    </div>

                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>

  <div class="d-flex justify-content-center">
      {{ $nurse_categories->links() }}
  </div>

  @else
      <h3 class="text-center alert alert-info">Empty!</h3>
  @endif
</div>

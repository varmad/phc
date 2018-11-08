
<div class="pull-right" style="padding:2px;">
  {!! Form::model($job, ['method' => 'DELETE', 'route' => ['jobs.destroy', $job], 'class' => 'form-inline', 'data-confirm' => __('forms.jobs.delete')]) !!}
      {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'name' => 'submit', 'type' => 'submit']) !!}
  {!! Form::close() !!}
</div>
<div class="pull-right" style="padding:2px;">
  <a href="{{ route('jobs.edit', $job) }}" class="btn btn-primary btn-sm">
      <i class="fa fa-pencil" aria-hidden="true"></i>
  </a>
</div>
<div class="pull-right" style="padding:2px;">
  <a href="{{ route('admin.job.accepted-list', $job->job_reference_id) }}" title="Accepted Shifts" class="btn btn-primary btn-sm">
      <i class="fa fa-eye" aria-hidden="true"></i>
  </a>
</div>

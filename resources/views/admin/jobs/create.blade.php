@extends('layouts.admin')

@section('content')
<section class="content-header"></section>
<div class="container">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
          <h1>
              <i class="glyphicon glyphicon-edit"></i> Job / Create
          </h1>
        </div>

        @include('common.alerts')

        <div class="panel-body">
          {!! Form::open(['route' => ['jobs.store'], 'method' =>'POST']) !!}
          @include('admin/jobs/_form')

          {{ link_to_route('jobs.index', 'Back', [], ['class' => 'btn btn-secondary']) }}
          {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
          {!! Form::close() !!}
        </div>
      </div>
  </div>
</div>
@endsection

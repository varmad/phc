@extends('layouts.admin')

@section('content')
<section class="content-header"></section>
<div class="container">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
          <h1>
              <i class="glyphicon glyphicon-edit"></i> User / Create
          </h1>
        </div>

        @include('common.alerts')

        <div class="panel-body">
          {!! Form::open(['route' => ['users.store'], 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}
          @include('admin/users/_form')

          {{ link_to_route('users.index', 'Back', [], ['class' => 'btn btn-secondary']) }}
          {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
          {!! Form::close() !!}
        </div>
      </div>
  </div>
</div>
@endsection

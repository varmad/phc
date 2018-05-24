@extends('layouts.admin')

@section('content')
<section class="content-header"></section>
<div class="container">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
          <h1>
              <i class="glyphicon glyphicon-edit"></i> Shift / Edit
          </h1>
        </div>
        @include('common.alerts')
        <div class="panel-body">
          {!! Form::model($shift,['route' => ['shifts.update', $shift], 'method' =>'PUT']) !!}
          @include('admin/shifts/_form')

          {{ link_to_route('shifts.index', 'Back', [], ['class' => 'btn btn-secondary']) }}
          {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
          {!! Form::close() !!}
        </div>
      </div>
  </div>
</div>
@endsection

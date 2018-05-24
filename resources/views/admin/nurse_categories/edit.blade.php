@extends('layouts.admin')

@section('content')
<section class="content-header"></section>
<div class="container">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
          <h1>
              <i class="glyphicon glyphicon-edit"></i> NurseCategory / Edit
          </h1>
        </div>
        @include('common.alerts')
        <div class="panel-body">
          {!! Form::model($nurse_category,['route' => ['nurse-categories.update', $nurse_category], 'method' =>'PUT']) !!}
          @include('admin/nurse_categories/_form')

          {{ link_to_route('nurse-categories.index', 'Back', [], ['class' => 'btn btn-secondary']) }}
          {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
          {!! Form::close() !!}
        </div>
      </div>
  </div>
</div>
@endsection

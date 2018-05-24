@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header"></section>
<div class="container">
  <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
            <h1>
                <i class="glyphicon glyphicon-align-justify"></i> Jobs
                <a class="btn btn-success pull-right" href="{{ route('jobs.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
            </h1>
        </div>
        @include('common.alerts')

        @include ('admin/jobs/_datatable')
      </div>
  </div>
</div>




<!-- <form method="POST" action="http://local.phc.laravel.com/admin/nurse-categories/1" accept-charset="UTF-8" class="form-inline" data-confirm="forms.nurse_categories.delete">
  <input name="_method" type="hidden" value="DELETE">
  <input name="_token" type="hidden" value="eRvaCTsZDO3HnEee3TgwJoVIdHemTPQdPPbBWV1o">
  <button class="btn btn-danger btn-sm" name="submit" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
</form> -->

@endsection

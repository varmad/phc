@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-edit"></i> People /
                    @if($people->id)
                        Edit #{{$people->id}}
                    @else
                        Create
                    @endif
                </h1>
            </div>

            @include('common.error')

            <div class="panel-body">
                @if($people->id)
                    <form action="{{ route('peoples.update', $people->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('peoples.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                	<label for="job_refer_id-field">Job_refer_id</label>
                	<input class="form-control" type="text" name="job_refer_id" id="job_refer_id-field" value="{{ old('job_refer_id', $people->job_refer_id ) }}" />
                </div>
                <div class="form-group">
                    <label for="nursing_id-field">Nursing_id</label>
                    <input class="form-control" type="text" name="nursing_id" id="nursing_id-field" value="{{ old('nursing_id', $people->nursing_id ) }}" />
                </div>
                <div class="form-group">
                    <label for="staff_count-field">Staff_count</label>
                    <input class="form-control" type="text" name="staff_count" id="staff_count-field" value="{{ old('staff_count', $people->staff_count ) }}" />
                </div>
                <div class="form-group">
                    <label for="staff_cat_id-field">Staff_cat_id</label>
                    <input class="form-control" type="text" name="staff_cat_id" id="staff_cat_id-field" value="{{ old('staff_cat_id', $people->staff_cat_id ) }}" />
                </div>
                <div class="form-group">
                    <label for="shift_id-field">Shift_id</label>
                    <input class="form-control" type="text" name="shift_id" id="shift_id-field" value="{{ old('shift_id', $people->shift_id ) }}" />
                </div>

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-link pull-right" href="{{ route('peoples.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

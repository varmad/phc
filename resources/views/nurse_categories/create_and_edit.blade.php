@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-edit"></i> NurseCategory /
                    @if($nurse_category->id)
                        Edit #{{$nurse_category->id}}
                    @else
                        Create
                    @endif
                </h1>
            </div>

            @include('common.error')

            <div class="panel-body">
                @if($nurse_category->id)
                    <form action="{{ route('nurse_categories.update', $nurse_category->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('nurse_categories.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                	<label for="name-field">Name</label>
                	<input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $nurse_category->name ) }}" />
                </div>
                <div class="form-group">
                	<label for="description-field">Description</label>
                	<textarea name="description" id="description-field" class="form-control" rows="3">{{ old('description', $nurse_category->description ) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="is_active-field">Is_active</label>
                    <input class="form-control" type="text" name="is_active" id="is_active-field" value="{{ old('is_active', $nurse_category->is_active ) }}" />
                </div>
                <div class="form-group">
                    <label for="created_by-field">Created_by</label>
                    <input class="form-control" type="text" name="created_by" id="created_by-field" value="{{ old('created_by', $nurse_category->created_by ) }}" />
                </div>
                <div class="form-group">
                    <label for="updated_by-field">Updated_by</label>
                    <input class="form-control" type="text" name="updated_by" id="updated_by-field" value="{{ old('updated_by', $nurse_category->updated_by ) }}" />
                </div>

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-link pull-right" href="{{ route('nurse_categories.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

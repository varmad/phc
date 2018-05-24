@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>NurseCategory / Show #{{ $nurse_category->id }}</h1>
            </div>

            <div class="panel-body">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-link" href="{{ route('nurse_categories.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                        </div>
                        <div class="col-md-6">
                             <a class="btn btn-sm btn-warning pull-right" href="{{ route('nurse_categories.edit', $nurse_category->id) }}">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>

                <label>Name</label>
<p>
	{{ $nurse_category->name }}
</p> <label>Description</label>
<p>
	{{ $nurse_category->description }}
</p> <label>Is_active</label>
<p>
	{{ $nurse_category->is_active }}
</p> <label>Created_by</label>
<p>
	{{ $nurse_category->created_by }}
</p> <label>Updated_by</label>
<p>
	{{ $nurse_category->updated_by }}
</p>
            </div>
        </div>
    </div>
</div>

@endsection

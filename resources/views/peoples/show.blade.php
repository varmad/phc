@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>People / Show #{{ $people->id }}</h1>
            </div>

            <div class="panel-body">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-link" href="{{ route('peoples.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                        </div>
                        <div class="col-md-6">
                             <a class="btn btn-sm btn-warning pull-right" href="{{ route('peoples.edit', $people->id) }}">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>

                <label>Job_refer_id</label>
<p>
	{{ $people->job_refer_id }}
</p> <label>Nursing_id</label>
<p>
	{{ $people->nursing_id }}
</p> <label>Staff_count</label>
<p>
	{{ $people->staff_count }}
</p> <label>Staff_cat_id</label>
<p>
	{{ $people->staff_cat_id }}
</p> <label>Shift_id</label>
<p>
	{{ $people->shift_id }}
</p>
            </div>
        </div>
    </div>
</div>

@endsection

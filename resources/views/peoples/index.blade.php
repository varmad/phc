@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-align-justify"></i> People
                    <a class="btn btn-success pull-right" href="{{ route('peoples.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
                </h1>
            </div>

            <div class="panel-body">
                @if($peoples->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Job_refer_id</th> <th>Nursing_id</th> <th>Staff_count</th> <th>Staff_cat_id</th> <th>Shift_id</th>
                                <th class="text-right">OPTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($peoples as $people)
                                <tr>
                                    <td class="text-center"><strong>{{$people->id}}</strong></td>

                                    <td>{{$people->job_refer_id}}</td> <td>{{$people->nursing_id}}</td> <td>{{$people->staff_count}}</td> <td>{{$people->staff_cat_id}}</td> <td>{{$people->shift_id}}</td>

                                    <td class="text-right">
                                        <a class="btn btn-xs btn-primary" href="{{ route('peoples.show', $people->id) }}">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>

                                        <a class="btn btn-xs btn-warning" href="{{ route('peoples.edit', $people->id) }}">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>

                                        <form action="{{ route('peoples.destroy', $people->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">

                                            <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $peoples->render() !!}
                @else
                    <h3 class="text-center alert alert-info">Empty!</h3>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-align-justify"></i> NurseCategory
                    <a class="btn btn-success pull-right" href="{{ route('nurse_categories.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
                </h1>
            </div>

            <div class="panel-body">
                @if($nurse_categories->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th> <th>Description</th> <th>Is_active</th> <th>Created_by</th> <th>Updated_by</th>
                                <th class="text-right">OPTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($nurse_categories as $nurse_category)
                                <tr>
                                    <td class="text-center"><strong>{{$nurse_category->id}}</strong></td>

                                    <td>{{$nurse_category->name}}</td> <td>{{$nurse_category->description}}</td> <td>{{$nurse_category->is_active}}</td> <td>{{$nurse_category->created_by}}</td> <td>{{$nurse_category->updated_by}}</td>

                                    <td class="text-right">
                                        <a class="btn btn-xs btn-primary" href="{{ route('nurse_categories.show', $nurse_category->id) }}">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </a>

                                        <a class="btn btn-xs btn-warning" href="{{ route('nurse_categories.edit', $nurse_category->id) }}">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>

                                        <form action="{{ route('nurse_categories.destroy', $nurse_category->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">

                                            <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $nurse_categories->render() !!}
                @else
                    <h3 class="text-center alert alert-info">Empty!</h3>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

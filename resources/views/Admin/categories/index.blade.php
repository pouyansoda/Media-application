@extends('layouts.admin')

@section('content')
    @if ($message = Session::get('notAllowed'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <h1>Categories</h1>
    <div class="col-sm-6">
        {!! Form::open(['method'=>'post', 'action' => 'AdminCategoriesController@store', 'files'=> true]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null,['class'=>'form-control']) !!}
        </div>
        @if($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
        <div class="form-group mt-3">
            {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-sm-6">
        <table class="table table-striped table-dark table-bordered">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
            </thead>
            <tbody>
            @if($categories)
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td><a href="{{route('categories.edit', $category->id)}}">{{ $category->name }}</a></td>
                        <td>{{ $category->created_at->diffForhumans() }}</td>
                        <td>{{ $category->updated_at ? $category->updated_at->diffForhumans() : 'no date' }}</td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>
    </div>
@endsection


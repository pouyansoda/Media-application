@extends('layouts.admin')

@section('content')
    @if ($message = Session::get('notAllowed'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <h1>Categories Edit</h1>
    <div class="col-sm-6">
        {!! Form::model($category,['method'=>'PATCH', 'action' => ['AdminCategoriesController@update', $category->id], 'files'=> true]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null,['class'=>'form-control']) !!}
        </div>
        @if($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
        <div class="form-group mt-3">
            {!! Form::submit('Update Category', ['class'=>'btn btn-primary col-sm-4']) !!}
        </div>
        {!! Form::close() !!}
        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminCategoriesController@destroy', $category->id]]) !!}
        <div class="form-group">
            {!! Form::submit('Delete category', ['class'=>'btn btn-danger col-sm-4']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-sm-6">

    </div>
@endsection


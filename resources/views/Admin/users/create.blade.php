@extends('layouts.admin')

@section('content')
    <h1>Create user</h1>
    {!! Form::open(['method'=>'post', 'action' => 'AdminUsersController@store', 'files'=> true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class'=>'form-control']) !!}
    </div>
    @if($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif
    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>
    @if($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
    @endif
    <div class="form-group">
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id', [''=> 'Choose Options'] + $roles , null, ['class'=>'form-control']) !!}
    </div>
    @if($errors->has('role_id'))
        <span class="text-danger">{{ $errors->first('role_id') }}</span>
    @endif
    <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active',[1 => 'Active', 0 => 'Not Active'],0 , ['class'=>'form-control']) !!}
    </div>
    @if($errors->has('is_active'))
        <span class="text-danger">{{ $errors->first('is_active') }}</span>
    @endif
    <div class="form-group">
        {!! Form::label('photo_id', 'Files:') !!}
        {!! Form::file('photo_id',null , ['class'=>'form-control']) !!}
    </div>
    @if($errors->has('photo_id'))
        <span class="text-danger">{{ $errors->first('photo_id') }}</span>
    @endif
    <div class="form-group">
        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection


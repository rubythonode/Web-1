@extends('layouts/master')


@section('title') {{ trans('user.user_creation') }} @stop 

@section('id_page', 'support') @stop

@section('content')

@include('partial.menu_admin',['title' => trans('user.user_creation')])

@include('partial.message')
{{-- {{ dd(Input::old('email')) }} --}}
	<div class="container ">
	 	<div class="panel panel-default">
	 		<div class="panel-body">
	 		@if(!isset($user))
	 		{!! Form::open(['route' => Utility::panelRoute('users.store') ])!!}
	 		@else
			{!!	Form::model($user,['route' => [Utility::panelRoute('users.update'), $user->id] , 'method' => 'PUT']) !!}
				{!! Form::hidden('_method', 'PUT') !!}
			@endif
			<div class="form-group">
				<div class="col-sm-4">
					{!! Form::label('email', trans('user.email')) !!}
					{!! Form::email('email', old('email'), ['class'=>'form-control '] ) !!}
				</div>
				<div class="col-sm-4">
					{!! Form::label('first_name', trans('user.first_name')) !!}
					{!! Form::text('first_name', old('first_name'), ['class'=>'form-control '] ) !!}
				</div>
				<div class="col-sm-4">
					{!! Form::label('last_name', trans('user.last_name')) !!}
					{!! Form::text('last_name', old('last_name'), ['class'=>'form-control '] ) !!}
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-4">
					{!! Form::label('password', trans('user.password')) !!}
					{!! Form::password('password', ['class'=>'form-control '] ) !!}
				</div>
				<div class="col-sm-4">
					{!! Form::label('timezone', trans('user.timezone')) !!}

					<?php foreach(DateTimeZone::listIdentifiers() as $row) $array[$row]=$row; ?>

					{!! Form::select('timezone', $array , old('timezone'), ['class'=>'form-control ']) !!}
				</div>

				<div class="col-sm-4">
					{!! Form::label('language', trans('user.language')) !!}
					{!! Form::select('language',['en'=>'en'],  old('language'), ['class'=>'form-control '])!!}
				</div>
			</div>

			@hasrole('Root','Administrator')


			<div class="form-group">
				<div class="col-sm-4">
					{!! Form::label('status', trans('globals.status')) !!}
					{!! Form::select('status', Utility::getEnumValues('users', 'status'), old('status'), ['class'=>'form-control '])!!}
				</div>
				<div class="col-sm-4">
					{!! Form::label('role', trans('user.role')) !!}
					{!! Form::select('role', Utility::getEnumValues('users', 'role'), old('role'), ['class'=>'form-control '])!!}
				</div>
			</div>
			
			@endhasrole

			<div class="col-sm-12">&nbsp;</div>
			<div class="form-group">

				<div class="col-sm-12">
					{!! Form::submit(trans('globals.save'),['class' => 'btn btn-primary']) !!}
					{!! Form::reset(trans('globals.reset'),['class' => 'btn btn-default']) !!}
				</div>
			</div>
		 
			{!! Form::close() !!}
			</div>
		</div>
	</div>

@stop

@section('scripts')

@stop

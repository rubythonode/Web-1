@extends('layouts/master')


@section('title') {{ trans('user.user_creation') }} @stop 

@section('id_page', 'support') @stop

@section('content')

@include('partial.menu_admin',['title' => trans('user.user_creation')])

@include('partial.message')

	<div class="container ">
	 	<div class="panel panel-default">
			<table class="table table-striped">
				<thead>
			        <tr>
			          <th>ID</th>
			          <th>{{ trans('user.first_name') }}</th>
			          <th>{{ trans('user.last_name') }}</th>
			          <th>{{ trans('user.email') }}</th>
			          <th>{{ trans('user.plan') }}</th>
			          <th>{{ trans('user.actions') }}</th>
			        </tr>
			     </thead>
			     <tbody>
			     @foreach($users as $user)
			     	<tr>
			     		<td>{{ $user->id }}</td>
			          	<td>{{ $user->first_name }}</td>
			          	<td>{{ $user->last_name }}</td>
			          	<td>{{ $user->email }}</td>
			          	<td>{{ $user->stripe_plan }}</td>
			          	<td>@include('user.actions_admin')</td>
			     	</tr>
			     @endforeach	
			     </tbody>
			</table>	
		</div>{!! $users->render() !!}
	</div>	


@stop

@section('scripts')

@stop

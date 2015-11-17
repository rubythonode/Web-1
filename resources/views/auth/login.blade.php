@extends('layouts/master')

@section('navigation') @stop

@section('title') Login @stop 

@section('id_page', 'signup') @stop

@include('partial.message')

@section('content')

	<div class="container">
		<div class="row header">
			<div class="col-md-12">
				<h3 class="logo">
					<a href="/">{{ trans('user.signin_content.title') }}</a>
				</h3>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="wrapper clearfix">
					<div class="formy">

						<div class="row">
							<div class="col-md-12">
								<a href="/login/facebook" class="button button-small col-md-12 text-center">
									<span class="fa fa-facebook-square"></span>
									{{ trans('user.signin_content.facebook_login') }} </a>
								</a>
							</div>
						</div>

						<hr>

						<div class="row">

							<div class="col-md-12">

								{!! Form::open(['url'=>'auth/login', 'role'=>'form']) !!}
								
									<div class="form-group">
							    		{!! Form::label('email',trans('user.email')) !!}
										{!! Form::text('email', old('email'), ['class'=>'form-control']) !!}
							  		</div>

							  		<div class="form-group">
							    		{!! Form::label('password',trans('user.password')) !!}
							    		<input type="password" class="form-control" id="password" name="password" />
							  		</div>

							  		<div class="form-group">
										<label>{{ trans('user.are_you_human') }}</label>
										{!! Recaptcha::render() !!}
						  			</div>

							  		<div class="checkbox">
							    		<label>
							    			{!! Form::checkbox('remember', 'value', false) !!}&nbsp;{{ trans('user.remember_me')  }}
							    		</label>
							  		</div>

							  		<div class="submit">
							  			<button type="submit" class="button-clear col-md-12 text-center">
								  			<span>{{ trans('user.signin_content.sign_in_here') }}</span>
								  		</button>
							  		</div>
								
								{!! Form::close() !!}

							</div>
						</div>						
					</div>
				</div>
				<div class="already-account">
					{{ trans('user.signin_content.no_account') }}
					<a href="/auth/register" data-toggle="popover" data-placement="top" data-content="{{ trans('user.signin_content.go_to_sign_up') }}" data-trigger="manual">{{ trans('user.signin_content.create_one_here') }}</a>
				</div>
			</div>
		</div>
	</div>

@stop

@section('scripts')
	<script type="text/javascript">
		$(function ()
		{
			$(".already-account a").mouseover(function()
			{
  				$(".already-account a").popover('show');
			});

			$(".already-account a").mouseout(function()
			{
  				$(".already-account a").popover('hide');
			});
		});
	</script>
@stop

@section('footer') @stop

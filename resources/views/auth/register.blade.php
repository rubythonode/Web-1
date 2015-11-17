@extends('layouts/master')

@section('navigation') @stop

@section('title') {{ trans('user.signup_content.title') }} @stop 

@section('id_page', 'signup') @stop

@include('partial.message')

@section('content')
	<div class="container">
		<div class="row header">
			<div class="col-md-12">
				<h4>
					{{ trans('user.signup_content.slogan') }}
				</h4>
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
									{{ trans('user.signup_content.facebook_login') }} </a>
								</a>
							</div>
						</div>

						<hr>

						<div class="row">
							<div class="col-md-12">
								{!! Form::open(['url'=>'auth/register', 'role'=>'form']) !!}
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											{!! Form::label('first_name',trans('user.first_name')) !!}
											{!! Form::text('first_name', old('first_name'), ['class'=>'form-control']) !!}
								  		</div>
							  		</div>
							  		<div class="col-md-6">
							  			<div class="form-group">
							    			{!! Form::label('last_name',trans('user.last_name')) !!}
											{!! Form::text('last_name', old('last_name'), ['class'=>'form-control']) !!}
							  			</div>
							  		</div>
								</div>
								
						  		<div class="form-group">
						    		{!! Form::label('email',trans('user.email')) !!}
									{!! Form::text('email', old('email'), ['class'=>'form-control']) !!}
						  		</div>
						  		
						  		<div class="form-group">
						    		{!! Form::label('password',trans('user.password')) !!}
									<input type="password" name="password" id="password" class="form-control" value="">	
						  		</div>

								<div class="form-group">
									<label>{{ trans('user.are_you_human') }}</label>
									{!! Recaptcha::render() !!}
						  		</div>

								<div class="checkbox">
						    		<label>
						      			{!! Form::checkbox('agreement', 'value', false) !!}&nbsp;{{ trans('globals.read_agree_01')  }}&nbsp;
						      			<a href="#">{{ trans('globals.read_agree_02') }}</a>.
						    		</label>
						  		</div>

								<div class="submit">
						  			<button type="submit" class="button-clear col-md-12 text-center">
							  			<span>{{ trans('user.signup_content.create_my_account') }}</span>
							  		</button>
						  		</div>

								{!! Form::close() !!}
							</div>
						</div>						
					</div>
				</div> {{-- wrapper --}}

				<div class="already-account">
					{{ trans('user.signup_content.already_have_account') }}
					<a href="/auth/login" data-toggle="popover" data-placement="top" data-content="{{ trans('user.signup_content.go_to_sign_in') }}" data-trigger="manual">{{ trans('user.signup_content.sign_in_here') }}</a>
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
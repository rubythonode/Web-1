<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>{{ trans('globals.app_title') }} - @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />



	@section('css')
		{!! Html::style('/css/vendor/theme.css') !!}
		{!! Html::style('/css/vendor/animate.css') !!}
		{!! Html::style('/css/vendor/font-awesome.min.css') !!}
		{!! Html::style('/antvel-bower/pnotify/pnotify.core.css') !!}
		{!! Html::style('/antvel-bower/pnotify/pnotify.buttons.css') !!}
		{!! Html::style('/css/app.css') !!}
	@show

	@section('js')
		{!! Html::script('/antvel-bower/jquery/dist/jquery.js') !!}
		{!! Html::script('/antvel-bower/bootstrap/dist/js/bootstrap.js') !!}
		{!! Html::script('/antvel-bower/pnotify/pnotify.core.js') !!}
		{!! Html::script('/antvel-bower/pnotify/pnotify.buttons.js') !!}
		{!! Html::script('/js/theme.js') !!}
	@show

	<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body id="@yield('id_page', 'home2')">

	@section('navigation')
		@include('partial.navigation')
	@show

	@section('content')

	@show

	@section('footer')
		@include('partial.footer')
	@show

	{{-- this section is to place all the scripts needed in each view --}}
	@section('scripts')

	@show

	@section('jsMessages')

	@show

</body>
</html>
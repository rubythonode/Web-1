@extends('auth.auth')

@include('partial.message')

@section('htmlheader_title')
    {{ trans('user.signin_content.title') }}
@endsection

@section('content')
<body class="login-page">
    <div class="login-box">

        <div class="login-logo">
            <a href="{{ url('/home') }}"><b>{{ trans('user.signin_content.sign_in_here') }}</b></a>
        </div><!-- /.login-logo -->

        <div class="login-box-body">

            <p class="login-box-msg">{{ trans('user.signin_content.start_your_session') }}</p>

            <form action="{{ url('/auth/login') }}" method = "post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="{{ trans('user.email') }}" name="email"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="{{ trans('user.password') }}" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> {{ trans('user.remember_me')  }}
                            </label>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('user.signin_content.sign_in_here') }}</button>
                    </div><!-- /.col -->
                </div>
            </form>

            <hr>

            <div class="social-auth-links text-center">
                <a href="/login/facebook" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> {{ trans('user.signin_content.facebook_login') }} </a></a>
            </div>

            <a href="{{ url('/password/email') }}">{{ trans('user.signin_content.forgot_my_password') }}</a><br>
            <a href="{{ url('/auth/register') }}" class="text-center">{{ trans('user.signin_content.go_to_sign_up') }}</a>

        </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->

    @include('auth.scripts')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection

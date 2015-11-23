@extends('auth.auth')

@include('partial.message')

@section('htmlheader_title')
    {{ trans('user.signup_content.title') }}
@endsection

@section('content')

    <body class="register-page">
    <div class="register-box">

        <div class="register-logo">
            <a href="{{ url('/home') }}"><b>{{ trans('user.signup_content.title') }}</b></a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">{{ trans('user.signup_content.slogan') }}</p>

            <form action="{{ url('/auth/register') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="{{ trans('user.first_name') }}" name="first_name" value="{{ old('first_name') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="{{ trans('user.last_name') }}" name="last_name" value="{{ old('last_name') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input name="agreement" type="checkbox">&nbsp;{{ trans('globals.read_agree_01') }} <a href="#">{{ trans('globals.read_agree_02') }}</a>
                            </label>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('user.signup_content.register') }}</button>
                    </div><!-- /.col -->
                </div>
            </form>

            <hr>
            <div class="social-auth-links text-center">
                <a href="/login/facebook" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>{{ trans('user.signup_content.facebook_login') }} </a>
            </div>

            <a href="{{ url('/auth/login') }}" class="text-center">{{ trans('user.signup_content.already_have_account') }}</a>
        </div><!-- /.form-box -->
    </div><!-- /.register-box -->

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

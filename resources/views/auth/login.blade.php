@extends('layouts.standalone')

@section('content')
<div class="login-box">
	<div class="login-logo">
		<a href="{{ url('/') }}"><b>{{ crminfo('name') }}</b></a>
	</div><!-- /.login-logo -->
	<div class="login-box-body">

		<p class="login-box-msg">Sign in to enter the CRM</p>
		@include('includes.flash-standalone')

		<form role="form" method="POST" action="{{ url('/login') }}">
			{!! csrf_field() !!}

			<div class="form-group{{ $errors->has('login') ? ' has-error' : ' has-feedback' }}">
				<input type="text" class="form-control" placeholder="E-Mail or Username" name="login" value="{{ old('login') }}">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				
				@if ($errors->has('login'))
				<span class="help-block">
					<strong>{{ $errors->first('login') }}</strong>
				</span>
				@endif
			</div>

			<div class="form-group{{ $errors->has('password') ? ' has-error' : ' has-feedback' }}">
				<input type="password" class="form-control" placeholder="Password" name="password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>

				@if ($errors->has('password'))
				<span class="help-block">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
				@endif
			</div>

			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label>
							<input type="checkbox" name="remember"> Remember Me
						</label>
					</div>
				</div><!-- /.col -->
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-btn fa-sign-in"></i> Login</button>
				</div><!-- /.col -->
			</div>
		</form>
		@if ( crminfo('enable_registration') == 1)
		<a href="{{ url('/register') }}">Register</a><br>
		@endif
		<a href="{{ url('/password/reset') }}">Forgot Your Password?</a><br>
		<!-- <a href="register.html" class="text-center">Register a new membership</a> -->

	</div><!-- /.login-box-body -->
</div><!-- /.login-box -->


@endsection

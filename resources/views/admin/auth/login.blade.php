@extends('admin.layouts.general')

@section('content')
	<div class="login-box">
	  <div class="login-logo">
		<a href="{{ url('/') }}">Login</a>
	  </div>
	  <!-- /.login-logo -->
	  <div class="card">
		<div class="card-body login-card-body">
		  <p class="login-box-msg">Sign in to start your session</p>
		  <form method="POST" action="{{ route('login') }}">
			@csrf
			<div class="form-group">
				<div class="input-group">
				  <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
				  <div class="input-group-append">
					<div class="input-group-text">
					  <span class="fas fa-envelope"></span>
					</div>
				  </div>
				</div>
				@if($errors->has('email'))
					<span class="help-block text text-danger">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
				@if ($errors->has('authfailed'))
					<span class="help-block text text-danger">
						<strong>{{ $errors->first('authfailed') }}</strong>
					</span>
				@endif
			</div>
			<div class="form-group">				
				<div class="input-group">
				  <input type="password" name="password" value="" class="form-control" placeholder="Password">
				  <div class="input-group-append">
					<div class="input-group-text">
					  <span class="fas fa-lock"></span>
					</div>
				  </div>
				</div>
				@if($errors->has('password'))
					<span class="help-block text text-danger">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@enderror
			</div>	
			<div class="row">
			  <div class="col-8">
				<div class="icheck-primary">
				  <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
				  <label for="remember">
					Remember Me
				  </label>
				</div>
			  </div>
			  <!-- /.col -->
			  <div class="col-4">
				<button type="submit" class="btn btn-primary btn-block">Sign In</button>
			  </div>
			  <!-- /.col -->
			</div>
		  </form>

		  <p class="mb-1">
			<a href="{{ route('password.request') }}">I forgot my password</a>
		  </p>
		</div>
		<!-- /.login-card-body -->
	  </div>
	</div>
@endsection
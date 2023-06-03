@extends('admin.layouts.general')

@section('content')
	<div class="login-box">
	  <div class="login-logo">
		<a href="{{ url('/')}} ">Forgot Password</a>
	  </div>
	  <!-- /.login-logo -->
	  <div class="card">
		<div class="card-body login-card-body">
		  <p class="login-box-msg">You forgot your password?.</p>

		  <form method="POST" action="{{ route('password.email') }}">
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
			</div>
			<div class="row">
			  <div class="col-12">
				<button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
			  </div>
			  <!-- /.col -->
			</div>
		  </form>

		  <p class="mt-3 mb-1">
			<a href="{{ url('/') }}">Login</a>
		  </p>
		</div>
		<!-- /.login-card-body -->
	  </div>
	</div>
@endsection	
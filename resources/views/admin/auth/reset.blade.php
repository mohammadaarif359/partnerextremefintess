@extends('admin.layouts.general')

@section('content')
	<div class="login-box">
	  <div class="login-logo">
		<a href="{{ url('/')}} ">Reset Password</a>
	  </div>
	  <!-- /.login-logo -->
	  <div class="card">
		<div class="card-body login-card-body">
		  <p class="login-box-msg">Change your password?.</p>

		  <form method="POST" action="{{ route('password.update') }}">
			@csrf
			<div class="form-group">
				<div class="input-group">
				  <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="new-password">
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
				@endif
			</div>
			<div class="form-group">
				<div class="input-group">
				  <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" autocomplete="new-password">
				  <div class="input-group-append">
					<div class="input-group-text">
					  <span class="fas fa-lock"></span>
					</div>
				  </div>
				</div>
				@if($errors->has('password_confirmation'))
					<span class="help-block text text-danger">
						<strong>{{ $errors->first('password_confirmation') }}</strong>
					</span>
				@endif
				<input type='hidden' value="{{ $token }}" name="token">
				@if($errors->has('token'))
					<span class="help-block text text-danger">
						<strong>{{ $errors->first('token') }}</strong>
					</span>
				@endif
			</div>
			<div class="row">
			  <div class="col-12">
				<button type="submit" class="btn btn-primary btn-block">Reset Password</button>
			  </div>
			  <!-- /.col -->
			</div>
		  </form>
		</div>
		<!-- /.login-card-body -->
	  </div>
	</div>
@endsection
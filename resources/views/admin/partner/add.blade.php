@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="container-fluid">
	<div class="row">
	  <div class="col-md-12">
		<div class="card card-primary">
		  <div class="card-header">
			<h3 class="card-title">Add Partner <small></small></h3>
		  </div>
		  <form role="form" id="quickForm" method="POST" action="{{ route('admin.partner.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="card-body">
			  <div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label for="name">Name</label>
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
					@error('name')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">		
				  <div class="form-group">
					<label for="name">Email</label>
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
					@error('email')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">		
				  <div class="form-group">
					<label for="name">Mobile</label>
					<input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" autocomplete="email" autofocus>
					@error('mobile')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">		
				  <div class="form-group">
					<label for="name">Profile Picture</label>
					<div class="custom-file">
					  <input type="file" name="profile_photo" class="custom-file-input @error('profile_photo') is-invalid @enderror" id="profile_photo">
					  <label class="custom-file-label" for="customFile">Choose file</label>
					</div>
					@error('profile_photo')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">  
				  <div class="form-group">
					<label for="name">Password</label>
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
					@error('password')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">  
				  <div class="form-group">
					<label for="name">Confirm Password</label>
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
					@error('password_confirmation')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">  
				  <div class="form-group">
					<label for="name">Role</label>
					<select id="role" class="form-control @error('role') is-invalid @enderror" name="role">
						<option value='' selected>Select</option>
						@foreach($roles as $r=>$role)
							<option value="{{ $r }}">{{ $role }}</option>
						@endforeach
					</select>
					@error('role')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">  
				  <div class="form-group">
					<label for="name">Businees Name</label>
					<input id="business_name" type="text" class="form-control" name="business_name" value="{{ old('business_name') }}">
					@error('business_name')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">  
				  <div class="form-group">
					<label for="name">Owner Name</label>
					<input id="owner_name" type="text" class="form-control" name="owner_name" value="{{ old('owner_name') }}">
					@error('owner_name')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-12">  
				  <div class="form-group">
					<label for="name">Location</label>
					<textarea id="location" class="form-control" name="location" rows="3">{{ old('location') }}</textarea>
					@error('location')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">		
				  <div class="form-group">
					<label for="name">Businees Logo</label>
					<div class="custom-file">
					  <input type="file" name="logo" class="custom-file-input @error('logo') is-invalid @enderror" id="logo">
					  <label class="custom-file-label" for="customFile">Choose file</label>
					</div>
					@error('logo')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">		
				  <div class="form-group">
					<label for="name">Other Email</label>
					<input id="other_email" type="email" class="form-control @error('other_email') is-invalid @enderror" name="other_email" value="{{ old('other_email') }}">
					@error('other_email')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">		
				  <div class="form-group">
					<label for="name">Other Mobile</label>
					<input id="other_mobile" type="number" class="form-control @error('other_mobile') is-invalid @enderror" name="other_mobile" value="{{ old('other_mobile') }}">
					@error('other_mobile')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
			  </div>			
			</div>
			<div class="card-footer">
			  <button type="submit" class="btn btn-primary">Create</button>
			</div>
		  </form>
		</div>
		</div>
	  <div class="col-md-6">

	  </div>
	</div>
  </div>
</section>
@endsection
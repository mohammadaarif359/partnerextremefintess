@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="container-fluid">
	<div class="row">
	  <div class="col-md-12">
		<div class="card card-primary">
		  <div class="card-header">
			<h3 class="card-title">Edit Member <small></small></h3>
		  </div>
		  <form role="form" id="quickForm" method="POST" action="{{ route('admin.gym-member.update') }}" enctype="multipart/form-data">
			@csrf
			<input type='hidden' name='id' value='{{ $data->id }}'>
			<input type='hidden' name='partner_id' value='{{ $data->partner_id }}'>
			<div class="card-body">
			  <div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label for="name">Name</label>
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$data['name']) }}">
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
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$data['email']) }}">
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
					<input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile',$data['mobile']) }}">
					@error('mobile')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">  
				  <div class="form-group">
					<label for="age">Age</label>
					<select id="age" class="form-control @error('age') is-invalid @enderror" name="age">
						<option value='' selected>Select</option>
						@for($i=10;$i<=60;$i++)
							<option value="{{ $i }}" {{ old('age',$i == $data['age'] ? 'selected' : '') }}>{{ $i }}</option>
						@endfor
					</select>
					@error('age')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">  
				  <div class="form-group">
					<label for="blood_group">Blood Group</label>
					<select id="blood_group" class="form-control @error('blood_group') is-invalid @enderror" name="blood_group">
						<option value='' selected>Select</option>
						@foreach(config('gym.blood_group') as $blood)
							<option value="{{ $blood }}" {{ old('blood_group',$blood == $data['blood_group'] ? 'selected' : '') }}>{{ $blood }}</option>
						@endforeach
					</select>
					@error('blood_group')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">		
				  <div class="form-group">
					<label for="name">Date of Joining</label>
					<input id="joining_date" type="date" class="form-control @error('joining_date') is-invalid @enderror" name="joining_date" value="{{ old('joining_date',$data['joining_date']) }}">
					@error('doj')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">		
				  <div class="form-group">
					<label for="name">Profile Picture
						@if(!empty($data->profile_photo_url))
							<a href="{{ $data->profile_photo_url }}">| Download</a>	
						@endif	
					</label>
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
					<label for="name">Emergecy Contact</label>
					<input id="other_mobile" type="number" class="form-control @error('other_mobile') is-invalid @enderror" name="other_mobile" value="{{ old('other_mobile',$data['other_mobile']) }}">
					@error('other_mobile')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-12">  
				  <div class="form-group">
					<label for="name">Address</label>
					<textarea id="address" class="form-control" name="address" rows="3">{{ old('address',$data['address']) }}</textarea>
					@error('address')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
					<label for="name">Status</label><br/>
					<div class="form-check-inline">
					  <label class="form-check-label">
						<input type="radio" name="status" class="form-check-input" value="1" @if($data->status == 1) checked @endif>Active
					  </label>
					</div>
					<div class="form-check-inline">
					  <label class="form-check-label">
						<input type="radio" name="status" class="form-check-input" value="0" @if($data->status == 0) checked @endif>Deactive
					  </label>
					</div>
					@error('status')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
			  </div>			
			</div>
			<div class="card-footer">
			  <button type="submit" class="btn btn-primary">Update</button>
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
@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="container-fluid">
	<div class="row">
	  <div class="col-md-12">
		<div class="card card-primary">
		  <div class="card-header">
			<h3 class="card-title">Add Page <small></small></h3>
		  </div>
		  <form role="form" id="quickForm" method="POST" action="{{ route('admin.cms-page.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="card-body">
			  <div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label for="name">Title</label>
					<input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>
					@error('title')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="slug">Slug</label>
						<input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" autocomplete="slug" autofocus>
						@error('slug')
							<span class="error invalid-feedback">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>	
				<div class="col-md-6">  
				  <div class="form-group">
					<label for="name">Parent Page</label>
					<select id="parent_id" class="form-control @error('parent_id') is-invalid @enderror" name="parent_id">
						<option value='' selected>Select</option>
						@foreach($parentPage as $k=>$v)
							<option value="{{ $k }}">{{ $v }}</option>
						@endforeach
					</select>
					@error('parent_id')
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
						<input type="radio" name="status" class="form-check-input" value="1" checked>Active
					  </label>
					</div>
					<div class="form-check-inline">
					  <label class="form-check-label">
						<input type="radio" name="status" class="form-check-input" value="0">Deactive
					  </label>
					</div>
					@error('status')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label for="content">Content</label>
						<textarea rows="10" class="textarea @error('content') is-invalid @enderror" name="content" placeholder="text here"
						style="width: 100%; height: 200px !important; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('content') }}</textarea>
						@error('content')
							<span class="error invalid-feedback">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					  </div>
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
@section('pagejs')
<script>
	$(function () {
		$('.textarea').summernote()
	})
</script> 
@endsection
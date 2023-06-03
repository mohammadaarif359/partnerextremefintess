@extends('admin.layouts.main')

@section('content')
<section class="content">
	<div class="container-fluid">
		<!-- Info boxes -->
		<form method="get">
			<div class='row'>
				<div class='col-md-3'>
					<div class="input-group mb-3">
					  <input type="month" name='filter_date' class="form-control" aria-label="select month" value="{{ $filter_date }}">
					  <div class="input-group-append">
						<button class="btn btn-info" type='submit' id="basic-addon2">Apply</button>
					  </div>
					</div>
				</div>
			</div>
		</form>
		<div class="row">
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box">
			  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-handshake"></i></span>
			  <div class="info-box-content">
				<span class="info-box-text">Total Partners</span>
				<span class="info-box-number">{{ $count['total_partner'] }}</span>
			  </div>
			</div>
		  </div>
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-hands-helping"></i></span>

			  <div class="info-box-content">
				<span class="info-box-text">New Partner {{ $current_month_year }}</span>
				<span class="info-box-number">{{ $count['new_partner'] }}</span>
			  </div>
			</div>
		  </div>
		  <div class="clearfix hidden-md-up"></div>
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-friends"></i></span>
			  <div class="info-box-content">
				<span class="info-box-text">Total Gym Members</span>
				<span class="info-box-number">{{ $count['total_member'] }}</span>
			  </div>
			</div>
		  </div>
		  <div class="col-12 col-sm-6 col-md-3">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-astronaut"></i></span>

			  <div class="info-box-content">
				<span class="info-box-text">New Members {{ $current_month_year }}</span>
				<span class="info-box-number">{{ $count['new_member'] }}</span>
			  </div>
			</div>
		  </div>
		</div>
	</div>
</section>
@endsection
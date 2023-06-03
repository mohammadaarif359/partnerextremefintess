@extends('admin.layouts.main')

@section('content')
<section class="content">
	<div class="container-fluid">
		<!-- Info boxes -->
		<form method="get">
			<div class='row'>
				<div class='col-md-3'>
					<div class="input-group mb-3">
					  <input type='hidden' name='partner_id' value="{{ $partner_id }}">
					  <input type="month" name='filter_date' class="form-control" aria-label="select month" value="{{ $filter_date }}">
					  <div class="input-group-append">
						<button class="btn btn-info" type='submit' id="basic-addon2">Apply</button>
					  </div>
					</div>
				</div>
			</div>
		</form>
		<div class="row">
		  <div class="col-12 col-sm-6 col-md-4">
			<div class="info-box">
			  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
			  <div class="info-box-content">
				<span class="info-box-text">Total Members</span>
				<span class="info-box-number">{{ $count['total_member'] }}</span>
			  </div>
			</div>
		  </div>
		  <div class="col-12 col-sm-6 col-md-4">
			<div class="info-box">
			  <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>
			  <div class="info-box-content">
				<span class="info-box-text">Active Members</span>
				<span class="info-box-number">{{ $count['active_member'] }}</span>
			  </div>
			</div>
		  </div>
		  <div class="col-12 col-sm-6 col-md-4">
			<div class="info-box">
			  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-address-card"></i></span>
			  <div class="info-box-content">
				<span class="info-box-text">Total Plans</span>
				<span class="info-box-number">{{ $count['total_plan'] }}</span>
			  </div>
			</div>
		  </div>

		  <div class="col-12 col-sm-6 col-md-4">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-rupee-sign"></i></span>
			  <div class="info-box-content">
				<span class="info-box-text">Total Fee {{ $current_month_year }}</span>
				<span class="info-box-number">{{ $count['total_fee'] }}</span>
			  </div>
			</div>
		  </div>
		  <div class="col-12 col-sm-6 col-md-4">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-rupee-sign"></i></span>
			  <div class="info-box-content">
				<span class="info-box-text">Fee Recieved {{ $current_month_year }}</span>
				<span class="info-box-number">{{ $count['fee_recieved'] }}</span>
			  </div>
			</div>
		  </div>
		  <div class="col-12 col-sm-6 col-md-4">
			<div class="info-box mb-3">
			  <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-rupee-sign"></i></span>
			  <div class="info-box-content">
				<span class="info-box-text">Fee Due {{ $current_month_year }}</span>
				<span class="info-box-number">{{ $count['fee_due'] }}</span>
			  </div>
			</div>
		  </div>
		</div>
	</div>
	<div class="row">
		<div class="col-6 col-md-6 col-sm-6">
		  <div class="card">
			<div class="card-header bg-success">
			  <h3 class="card-title">Fee Recieved {{ $current_month_year }}</h3>
			  <div class="card-tools">
				  <div class="d-flex flex-row justify-content-center">			  
					  
				  </div>	
			  </div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<div class="load_area table-responsive">
					<table id="example1" class="table table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Mobile</th>
								<th>Recieved Date</th>
								<th>Plan</th>
								<th>Duration</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
						{{--@foreach($fee_recieved_members as $mem=>$member)
							<tr>	
								<td>{{ $member->name }}</td>
								<td>{{ $member->mobile }}</td>
								<td>{{ $member->last_fee_month }}</td>
								<td>{{ $member->active_assoc_plan->member_plan->title }}</td>
								<td>{{ $member->active_assoc_plan->member_plan->duration }}</td>
								<td>{{ $member->active_assoc_plan->amount }}</td>
							</tr>	
						@endforeach--}}
							@foreach($fee_recieved_members as $mem=>$member)
							<tr>	
								<td>{{ $member->name }}</td>
								<td>{{ $member->mobile }}</td>
								<td>{{ $member->assoc_plan_month->due_date }}</td>
								<td>{{ $member->assoc_plan_month->member_plan->title }}</td>
								<td>{{ $member->assoc_plan_month->member_plan->duration }}</td>
								<td>{{ $member->assoc_plan_month->amount }}</td>
							</tr>	
							@endforeach							
						</tfoot>
					</table>
				</div>
			</div>
		  </div>
		</div>
		<div class="col-6 col-md-6 col-sm-6">
		  <div class="card">
			<div class="card-header bg-danger">
			  <h3 class="card-title">Fee Due {{ $current_month_year }}</h3>
			  <div class="card-tools">
				  <div class="d-flex flex-row justify-content-center">			  
					  
				  </div>	
			  </div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<div class="load_area table-responsive">
					<table id="example1" class="table table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Mobile</th>
								<th>Due Date</th>
								<th>Plan</th>
								<th>Duration</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
							{{--@foreach($fee_due_members as $mem=>$member)
							<tr>	
								<td>{{ $member->name }}</td>
								<td>{{ $member->mobile }}</td>
								<td>{{ $member->next_fee_month }}</td>
								<td>{{ $member->active_assoc_plan->member_plan->title }}</td>
								<td>{{ $member->active_assoc_plan->member_plan->duration }}</td>
								<td>{{ $member->active_assoc_plan->amount }}</td>
							</tr>	
							@endforeach--}}
							@foreach($fee_due_members as $mem=>$member)
							<tr>	
								<td>{{ $member->name }}</td>
								<td>{{ $member->mobile }}</td>
								<td>{{ $member->assoc_plan_month->due_date }}</td>
								<td>{{ $member->assoc_plan_month->member_plan->title }}</td>
								<td>{{ $member->assoc_plan_month->member_plan->duration }}</td>
								<td>{{ $member->assoc_plan_month->amount }}</td>
							</tr>	
							@endforeach							
						</tfoot>
					</table>
				</div>
			</div>
		  </div>
		</div>
	 </div>
</section>
@endsection
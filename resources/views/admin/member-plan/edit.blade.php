@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="container-fluid">
	<div class="row">
	  <div class="col-md-12">
		<div class="card card-primary">
		  <div class="card-header">
			<h3 class="card-title">Edit Member Plan <small></small></h3>
		  </div>
		  <form role="form" id="quickForm" method="POST" action="{{ route('admin.member-plan.update') }}" enctype="multipart/form-data">
			@csrf
			<input type='hidden' name='id' value='{{ $data->id }}'>
			<input type='hidden' name='partner_id' value='{{ $partner_id }}'>
			<input type='hidden' name='member_id' value='{{ $member_id }}'>
			<div class="card-body">
			  <div class="row">
				<div class="col-md-6">  
				  <div class="form-group">
					<label for="plan_id">Plan</label>
					<select id="plan_id" class="form-control @error('plan_id') is-invalid @enderror" name="plan_id" readonly>
						<option value='' selected>Select</option>
						@foreach($plans as $plan)
							<option value="{{ $plan->id }}" data-plan_amount="{{ $plan->amount }}" data-plan_duration="{{ $plan->duration }}" {{ old('plan_id',$plan->id == $data['plan_id'] ? 'selected' : '') }}>{{ $plan->title }}</option>
						@endforeach
					</select>
					@error('plan_id')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">		
				  <div class="form-group">
					<label for="name">Amount</label>
					<input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount',$data['amount']) }}">
					@error('amount')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">		
				  <div class="form-group">
					<label for="name">Start Date</label>
					<input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date',$data['start_date']) }}" readonly>
					@error('start_date')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">		
				  <div class="form-group">
					<label for="name">End Date</label>
					<input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date',$data['end_date']) }}">
					@error('end_date')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-12">  
				  <div class="form-group">
					<label for="remark">Remark</label>
					<textarea id="remark" class="form-control" name="remark" rows="3">{{ old('remark',$data['remark']) }}</textarea>
					@error('remark')
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

@section('pagejs')
<script>
	$('#plan_id').change(function(){
		var amount = $(this).find(':selected').attr('data-plan_amount')
		var duration = $(this).find(':selected').attr('data-plan_duration')
		if(amount == '' || amount == undefined) {
			amount = 0;
		}
		$('#amount').val(amount);
		
		let start_date = $('#start_date').val();
		setEndDate(start_date,duration);
		
		
	});
	
	function setEndDate(start_date,duration) {
		console.log(duration);
		if(duration == '' || duration == undefined) {
			console.log('if duation',duration)
			$('#end_date').val(start_date);
		} else {
			console.log('else duation',duration)
			let end_date = new Date(start_date)
			end_date.setMonth(end_date.getMonth() + parseInt(duration));
			end_date = new Date(end_date).toISOString().slice(0, 10)
			$('#end_date').val(end_date);
		}
	}
	
	$('#start_date').change(function(){
		var start_date = $('#start_date').val();
		var duration = $('#plan_id').find(':selected').attr('data-plan_duration');
		setEndDate(start_date,duration);
	});
</script>	
@endsection
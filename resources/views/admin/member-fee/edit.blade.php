@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="container-fluid">
	<div class="row">
	  <div class="col-md-12">
		<div class="card card-primary">
		  <div class="card-header">
			<h3 class="card-title">Edit Memeber Fee <small></small></h3>
		  </div>
		  <form role="form" id="quickForm" method="POST" action="{{ route('admin.member-fee.update') }}" enctype="multipart/form-data">
			@csrf
			<input type='hidden' name='partner_id' value='{{ $partner_id }}'>
			<input type='hidden' name='member_id' value='{{ $member_id }}'>
			<input type='hidden' name='member_plan_id' value="{{ $data->member_plan_id }}">
			<input type='hidden' name='id' value="{{ $data->id }}">
			<div class="card-body">
			  <div class="row">
				<div class="col-md-6">		
				  <div class="form-group">
					<label for="name">Amount</label>
					<input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount',$data->amount) }}" readonly>
					@error('amount')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">		
				  <div class="form-group">
					<label for="fee_month">Fee Month</label>
					<input id="fee_month" type="date" class="form-control @error('fee_month') is-invalid @enderror" name="fee_month" value="{{ old('fee_month',$data->fee_month) }}" readonly>
					@error('fee_month')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">		
				  <div class="form-group">
					<label for="name">Recieved Date</label>
					<input id="recieved_at" type="datetime-local" class="form-control @error('recieved_at') is-invalid @enderror" name="recieved_at" value="{{ old('recieved_at',$data->recieved_at) }}">
					@error('recieved_at')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-6">		
				  <div class="form-group">
					<label for="name">Recieved By</label>
					<select id='recieved_by' class="form-control @error('recieved_by') is-invalid @enderror" name="recieved_by">
						<option value='' selected>select</option>
						@foreach(config('gym.fee_recevied_by') as $re=>$rec)
							<option value='{{ $re }}' {{ old('recieved_by',$data->recieved_by) == $re ? 'selected' : ''  }}>{{ $rec }}</option>
						@endforeach
					</select>
					@error('recieved_by')
						<span class="error invalid-feedback">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				  </div>
				</div>
				<div class="col-md-12">  
				  <div class="form-group">
					<label for="remark">Remark</label>
					<textarea id="remark" class="form-control" name="remark" rows="3">{{ old('remark',$data->remark) }}</textarea>
					@error('remark')
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
@section('pagejs')
<script>
</script>	
@endsection
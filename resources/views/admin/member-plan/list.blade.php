@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="row">
	<div class="col-12">
	  <div class="card">
		<div class="card-header">
		  <h3 class="card-title">Member Plan</h3>
		  <div class="card-tools">
			  <div class="d-flex flex-row justify-content-center">			  
				  <a href="{{ route('admin.member-plan.add',[$member_id,'partner_id' => $partner_id]) }}" class="btn btn-primary btn-sm ml-2">Add</a>
			  </div>	
		  </div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="load_area table-responsive">
				<table id="example1" class="table table-striped">
					<thead>
						<tr>
							<th>Plan</th>
							<th>Amount</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Status</th>
							<th>Created At</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					</tfoot>
				</table>
			</div>
		</div>
	  </div>
	</div>
 </div>	
</section>
@endsection
@section('pagejs')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script>
	$(function () {
    var table = $('#example1').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.member-plan',$member_id) }}",
        columns: [
            {data: 'member_plan.title', name: 'member_plan.title'},
            {data: 'amount', name: 'amount'},
			{data: 'start_date', name: 'start_date'},
			{data: 'end_date', name: 'end_date'},
            {data: 'status', name: 'status'},
			{data: 'created_at.display', name: 'created_at.display'},
			{data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
	$('.filter-input').keypress(function(){
        table.column($(this).data('column'))
             .search($(this).val())
             .draw();
	});
	$('.filter-select').change(function(){
		table.column($(this).data('column'))
             .search($(this).val())
             .draw();
	});
  });
</script>	
@endsection
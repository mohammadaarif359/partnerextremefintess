@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="row">
	<div class="col-12">
	  <div class="card">
		<div class="card-header">
		  <h3 class="card-title">Gym Plan</h3>
		  <div class="card-tools">
			  <div class="d-flex flex-row justify-content-center">			  
				  <a href="{{ route('admin.gym-plan.add',['partner_id' => $partner_id]) }}" class="btn btn-primary btn-sm ml-2">Add</a>
				  <a href="{{ route('admin.gym-plan.export',['partner_id' => $partner_id]) }}" class="btn btn-primary btn-sm ml-2">Export</a>
			  </div>	
		  </div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="load_area table-responsive">
				<table id="example1" class="table table-striped">
					<thead>
						<tr>
							<th>Title</th>
							<th>Duration</th>
							<th>Amount</th>
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
        ajax: "{{ url('/admin/gym-plan?partner_id='.$partner_id) }}",
        columns: [
            {data: 'title', name: 'title'},
            {data: 'duration', name: 'duration'},
			{data: 'amount', name: 'amount'},
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
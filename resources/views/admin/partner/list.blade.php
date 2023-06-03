@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="row">
	<div class="col-12">
	  <div class="card">
		<div class="card-header">
		  <h3 class="card-title">Partnes</h3>
		  <div class="card-tools">
			  <div class="d-flex flex-row justify-content-center">			  
				  <a href="{{ route('admin.partner.add') }}" class="btn btn-primary btn-sm ml-2">Add</a>
				  <a href="{{ route('admin.partner.export') }}" class="btn btn-primary btn-sm ml-2">Export</a>
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
							<th>Email</th>
							<th>Mobile</th>
							<th>Business Name</th>
							<th>Owner Name</th>
							<th>Member Count</th>
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
        ajax: "{{ route('admin.partner') }}",
        columns: [
            {data: 'partner_user.name', name: 'partner_user.name'},
            {data: 'partner_user.email', name: 'partner_user.email'},
            {data: 'partner_user.mobile', name: 'partner_user.mobile'},
			{data: 'business_name', name: 'business_name'},
			{data: 'owner_name', name: 'owner_name'},
			{data: 'partner_member_count', name: 'partner_member_count'},
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
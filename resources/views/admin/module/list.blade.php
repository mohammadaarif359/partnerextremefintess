@extends('admin.layouts.main')

@section('content')
<section class="content">
  <div class="row">
	<div class="col-12">
	  <div class="card">
		<div class="card-header">
		  <h3 class="card-title">Users</h3>
		  <div class="card-tools">
			  <a href="{{ route('admin.user.add') }}" class="btn btn-primary btn-sm">Add</a>
			  <a href="{{ url('/admin/'.$module.'/export') }}" class="btn btn-primary btn-sm">Export</a>
		  </div>
		</div>
		<!-- /.card-header -->
		<div class="card-body p-0">
			<form action="#" class="filter-form" method="post">
			<!-- CSRF Token -->
			@csrf
			<div class="load_area table-responsive">
				<table class="table table-striped text-nowrap">
					<thead>
						<tr>
							<th class="sorting" tabindex="0" rowspan="1" colspan="1">Name</th>
							<th class="sorting" tabindex="0" rowspan="1" colspan="1">Email</th>
							<th class="sorting" tabindex="0" rowspan="1" colspan="1">Mobile</th>
							<th class="sorting" tabindex="0" rowspan="1" colspan="1">Created On</th>
							<th class="sorting" tabindex="0" rowspan="1" colspan="1">Status</th>
							<th style="width:15%" class="sorting" tabindex="0" rowspan="1" colspan="1">Action</th>
						</tr>
						<tr class="row-filter">
							<th><input type="text" name="search_name" class="form-control w-50 filter" placeholder="Search Name"></th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
						</tr>
						</form>
					</thead>
					<tbody>
						
					</tbody>
				</table>
				<hr>
				<div class="row m-auto">
					
				</div>
			</div>
		</div>
	  </div>
	</div>
 </div>	
</section>
@endsection
@section('pagejs')	
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
	function getAdvancedFilters()
	{
		var filters = {};
		form = $("form.filter-form");
		form_val_arr = form.serializeArray();

		$.each(form_val_arr, function(k, v){
			filters[v.name] = v.value;
		});
		
		return filters;
	}
	
	$(document).ready(function(){
		
		var filters = getAdvancedFilters();
		loadData(1, filters);
	});
	
	
	$(document).on("click", ".paginate a", function(event){
		event.preventDefault();
		var pageurl = $(this).attr('href');
		var page=$(this).attr('href').split('page=')[1];
		var filters = getAdvancedFilters();
		loadData(page, filters);
	});

	$(document).on("change", "select.filter", function(){
		var filters = getAdvancedFilters();
		loadData(0, filters);
	});		
	
	$(document).on("keyup", "input.filter", function(){
		var filters = getAdvancedFilters();
		loadData(0, filters);
	});
	
	
	function loadData(page, filter){
		//toggleloader('div.load_area table tbody', '<tr><td colspan="7">', '</td></tr>');
		$.ajax({
			type: 'POST',
			data: {filter : filter},
			dataType: 'json',
			url: "?page="+page,
			success: function(data){
				//toggleloader('div.load_area table tbody');
				$("div.load_area table tbody").html(data.data);
				$("div.load_area div.row").html(data.pages);
				$("div.card-footer").html(data.pages);
			}
		});
	}
</script>
@endsection

<div class="col-sm-4">
	<div class="record-text">Showing {{$data->firstItem()}} to {{$data->lastItem()}} of {{$data->total()}} entries</div>
</div>
<div class="col-sm-8">
	<div class="paginate pagination-sm float-right">
		{{$data->links()}}
	</div>
</div>
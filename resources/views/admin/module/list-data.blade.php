@php $count = 0; @endphp
@foreach($data as $user)
<tr>
	<td>{{ $user->name }}</td>
	<td>{{ $user->email }}</td>
	<td>{{ $user->mobile }}</td>
	<td>{{ date('d-m-Y h:i:A',strtotime($user->created_at)) }}</td>
	<td>{!! ($user->status == 1)?'<span class="label label-success">Active</span>':'<span class="label label-danger">Inactive</span>' !!}</td></td>
	<td class="">
		<a href="{{ route('admin.user.edit',$user->id) }}" class="" title="Edit"><i class="fa fa-edit"></i></a>
		<a href="{{ route('admin.user.delete',$user->id) }}" class="" title="Delete"><i class="fa fa-trash"></i></a>
	</td>
</tr>
@php $count++; @endphp
@endforeach
@if($count == 0)
<tr>
	<td colspan="7">No record found!</td>
</tr>	
@endif
									
@component('mail::message')
# Hello {{$data['name']}},

{{$data['message']}}

Thanks,<br>
{{ $data['partner']['business_name'] }}
@endcomponent

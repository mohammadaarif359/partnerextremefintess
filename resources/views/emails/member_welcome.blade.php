@component('mail::message')
# Hello {{$data['name']}},

{{$data['message']}}

Thanks,<br>
{{ $data['member_partner']['business_name'] }}
@endcomponent

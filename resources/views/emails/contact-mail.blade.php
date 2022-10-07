@component('mail::message')
# {{ config('app.name') }} 
<hr>

<strong>@lang('mail.fullname')</strong> {{ $data['fullname'] }}<br>
<strong>@lang('mail.email')</strong> {{ $data['email'] }}<br>
<strong>@lang('mail.phone')</strong> {{ $data['phone'] }}<br>
<strong>@lang('mail.message'):</strong> 
{{ $data['message'] }}
@endcomponent

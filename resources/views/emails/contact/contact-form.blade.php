@component('mail::message')
# New message

You got a mail from {{$data['name']}} ({{$data['email']}}).

Sujet: {{$data['subject']}}

Message: {{$data['message']}}
{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent

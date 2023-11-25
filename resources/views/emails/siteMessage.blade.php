@component('mail::message')
    <b>Dear Hr-Trust Site Manager,</b>
<br>
There is new message sent to you form {{$name}} ({{$email}}) ,
<h2>{{$subject}}</h2>
<h3><b>Company:</b>{{$company}}</h3>
<p>{!! $message !!}</p>

@component('mail::button', ['url' => 'mailto:'.$email])
Reply Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')
{!! $newsletter->message??'' !!}
<img src="{{url('view/?sub_id='.$sub_id.'&newsletter_id='.$newsletter->id)}}" style="display: none;" />
@endcomponent

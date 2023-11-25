<section class="padding-top-70 padding-bottom-30" id="{{$section->alias}}" @if($section->background) style="background: url({{url('images/sections/backgrounds/'.$section->background)}}) center center fixed no-repeat;
    background-size: cover;" @endif>
<div class="heading text-center">
    <h4>{{($section->title && json_decode($section->title,true)[config('app.locale')])?  json_decode($section->title,true)[config('app.locale')]:''}}</h4>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            @if($section->sub_title && strip_tags(json_decode($section->sub_title,true)[config('app.locale')]))
            <h3>{!! ($section->sub_title && json_decode($section->sub_title,true)[config('app.locale')])?  json_decode($section->sub_title,true)[config('app.locale')]:'' !!}</h3>
            @endif
            <p>
                {!! ($section->intro_text && json_decode($section->intro_text,true)[config('app.locale')])?  json_decode($section->intro_text,true)[config('app.locale')]:'' !!}
            </p>
        </div>
    </div>
    <div>
        {!! ($section->body && json_decode($section->body,true)[config('app.locale')])?  json_decode($section->body,true)[config('app.locale')]:'' !!}
    </div>
</div>
</section>

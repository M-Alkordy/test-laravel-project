<style>
    .read_more_page
    {
        transition: 1s all;
        position:fixed;
        top:0px;
        left: -2000px;
        width: 0vw;
        height: 0vh;
        opacity: 0;
        z-index: 9999999;

    }
    .read_more_page.opened
    {
        margin: 0 auto;
        transition: 1s all;
        position:fixed;
        top:0vh;
        left: 0vw;
        width: 100vw;
        height: 100vh;
        opacity: 1;
        background-color: #fff;
        z-index: 9999999;
        overflow-y:auto;
        box-shadow: 0 0 4px 4px #aaa;
    }
    .read_more_page .container
    {
        padding-top: 70px;
        margin:0 auto;
    }
    .read_more_page img
    {
        max-width: 90%;
    }
</style>
<!-- SERVICES -->
<section id="{{$section->alias}}" class="services padding-top-40 padding-bottom-30" @if($section->background) style="background: url({{url('images/sections/backgrounds/'.$section->background)}}) center center fixed no-repeat;
    background-size: cover;" @endif>
    <div class="container">
        <!-- Heading -->
        <div class="heading text-center">
            <h4>{{($section->title && json_decode($section->title,true)[config('app.locale')])?  json_decode($section->title,true)[config('app.locale')]:''}}</h4>
        </div>
    </div>
    <div class="best-services">
        <!-- Row -->
        <div class="container">
            <ul class="row list">
                @foreach($section->services as $service)

                <!-- Consulting Solutions -->
                <li class="col-md-3" data-content="#colio_c{{$service->id}}">
                    <article class="thumb"> <a class="button colio-link" href="#">
                            @if($service->icon)
                            <img class="icon" src="{{asset('images/services/icons/'.$service->icon)}}">
                            @endif
                            <h5>{{json_decode($service->title,true)[config('app.locale')]}}</h5>
                            <p>{!! json_decode($service->sub_title,true)[config('app.locale')] !!}</p>
                        </a> </article>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Analytics Tab Open -->
    @foreach($section->services as $service)
    <div id="colio_c{{$service->id}}" class="colio-content">
        <div class="main">
            <div class="container">
                <div class="inside-colio">
                    <div class="row">
                        @if($service->img)
                        <div class="col-md-4 text-right"> <img class="img-responsive" src="{{asset('images/services/images/'.$service->img)}}" alt=""> </div>
                        @else
                            <div class="col-1"> </div>
                        @endif
                        <div class="col">
                            <!-- Heading -->
                            <div class="heading text-left margin-bottom-40">
                                <h4>{{json_decode($service->title,true)[config('app.locale')]}}</h4>
                            </div>
                            <p>
                                {!! json_decode($service->intro_text,true)[config('app.locale')] !!}
                            </p>
                            <a href="#colio_c{{$service->id}}" onclick="$('#more_page_{{$service->id}}').addClass('opened').fadeIn(1000); $('body').addClass('overflow-h');" class="btn btn-1 margin-top-30">Read More <i class="fa fa-caret-right"></i></a> </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="read_more_page" id="more_page_{{$service->id}}">

            <div class="container">
                <div class="btn-affix">
                <button class="btn btn-secondary mb-5" onclick="$('.opened').removeClass('opened'); $('body').removeClass('overflow-h');"><i class="fa fa-times"></i> {{__('Close')}}</button>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="heading text-left margin-bottom-40">
                            <h4>@if($service->icon)<img class="img-responsive" src="{{asset('images/services/icons/'.$service->icon)}}" alt="">@endif {{json_decode($service->title,true)[config('app.locale')]}}</h4>
                        </div>
                        <p>
                            {!! json_decode($service->intro_text,true)[config('app.locale')] !!}
                        </p>
                         </div>
                </div>
            <br>
            {!! json_decode($service->full_text,true)[config('app.locale')] !!}
            </div>
        </div>
@endforeach
</section>

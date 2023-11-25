@if($section->component)
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
            overflow-x: hidden;
            box-shadow: 0 0 4px 4px #aaa;
        }
        .read_more_page .container
        {
            padding-top: 70px;
            margin:0 auto;
        }

    </style>
<section class="home-slide" id="{{$section->alias}}">
    <ul class="slides">
        @foreach($section->component->slides()->where('published',1)->get() as $slide)
        <!-- {{$slide->id}} -->
        <li class="slide-img-1" data-stellar-background-ratio="0.6" style="background: linear-gradient(to bottom, rgba(54,53, 31, 0.3), rgba(54,53, 31, 0.5),rgba(54,53, 31, 0.6),rgba(54,53, 31, 0.8),rgba(54,53, 31, 0.9),rgba(54,53, 31, 0.9),rgba(193, 188, 159, 0.5),rgba(193, 188, 159, 0.5)),
            url({{asset('/images/slides/'.$slide->img)}}); background-size: cover;">
            <div class="position-center-center">
                <h1>{{json_decode($slide->title,true)[config('app.locale')]}}</h1>
                <h5>{!! json_decode($slide->description,true)[config('app.locale')]!!}</h5>
                <!-- Row -->
                <div class="container-floud services" style="zoom:0.8">
                    <ul class="row list p-0 m-0">
                    @foreach($section->services as $service)

                        <!-- Consulting Solutions -->
                            <li class="col colio-item " onclick="$('#more_page_{{$service->id}}').addClass('opened').fadeIn(1000); $('body').addClass('overflow-h');">
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
                @if($slide->link_type)
                <a href="{{$slide->link_value}}" class="btn margin-top-30">{{$slide->link_text}} <i class="fa fa-caret-right"></i></a> </div>
            @endif
        </li>
        @endforeach


    </ul>

</section>
@foreach($section->services as $service)
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
@if($section->component->slides()->where('published',1)->count()==1)

    <a id="next"></a>
    <div class="text-center" style="position: absolute;
    top: 90vh;
    z-index: 1000;
    width: 100%;">
    <a href="#next">
    <img style="width: 70px;" src="{{asset('assets/images/scroll-down-mouse.gif')}}">
    </a>
</div>

    @endif
    @endif



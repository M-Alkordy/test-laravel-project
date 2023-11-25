<style>
    .read_more_page_team
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
    .read_more_page_team.opened
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
    .read_more_page_team .container
    {
        padding-top: 70px;
        margin:0 auto;
    }
    .read_more_page_team img
    {
        max-width: 90%;
    }
</style>
<!-- Team -->
<section id="{{$section->alias}}" class="padding-top-70 padding-bottom-70" @if($section->background) style="background: url({{url('images/sections/backgrounds/'.$section->background)}}) center center fixed no-repeat;
    background-size: cover !important;" @endif>
    <div class="container">
        <!-- Heading -->
        <div class="heading text-center">
            <h4>{{($section->title && isset(json_decode($section->title,true)[config('app.locale')]))?json_decode($section->title,true)[config('app.locale')]:''}}</h4>
            @if($section->sub_title)
                <h4>{{($section->sub_title && isset(json_decode($section->sub_title,true)[config('app.locale')]))?json_decode($section->sub_title,true)[config('app.locale')]:''}}</h4>
            @endif
            @if($section->intro_text)
            <p>{!! ($section->intro_text && isset(json_decode($section->intro_text,true)[config('app.locale')]))?json_decode($section->intro_text,true)[config('app.locale')]:'' !!}</p>
            @endif
        </div>

        <!-- Team -->
        <div class="team">
            <div class="row">
                @foreach($section->teams as $team)
                <!-- Member -->
                    @if($team->lead)
                        <div  class="col-md-12" style="cursor: pointer;" onclick="$('#more_page_team_{{$team->id}}').addClass('opened').fadeIn(1000); $('body').addClass('overflow-h');">
                            <article class="row">
                                <div class="col-md-3">
                                @if($team->img)

                                    <img class="img-responsive" src="{{asset('images/teams/'.$team->img)}}" alt="" >

                                @else
                                    <img class="img-responsive" src="{{asset('assets/images/avatar.jpg')}}" alt="" >
                                @endif
                                    <h5 class="text-center">{{($team->name && isset(json_decode($team->name,true)[config('app.locale')]))?json_decode($team->name,true)[config('app.locale')]:''}}
                                        <br><small class="text-start text-secondary">{{($team->job_title && isset(json_decode($team->job_title,true)[config('app.locale')]))?json_decode($team->job_title,true)[config('app.locale')]:''}}</small></h5>
                                </div>
                                <div class="col-md-9 ">
                                    <div class="card mt-4" style="border-radius: 20px;">
                                        <div class="card-body">

                                <p>{!! ($team->intro_text && isset(json_decode($team->intro_text,true)[config('app.locale')]))?json_decode($team->intro_text,true)[config('app.locale')]:'' !!}</p>
                                    @if(false && ($team->full_text && isset(json_decode($team->full_text,true)[config('app.locale')])) && strip_tags(json_decode($team->full_text,true)[config('app.locale')]))
                                        <div class="text-center">
                                            <a class="btn btn-1" href="{{url('team/'.$team->id.'-'.\Illuminate\Support\Str::Slug(($team->name && isset(json_decode($team->name,true)[config('app.locale')]))?json_decode($team->name,true)[config('app.locale')]:''))}}">{{__('Read More')}} <i class="fa fa-caret-right"></i></a>
                                        </div>
                                    @endif
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>
                    @else

                <div  class="col" style="min-width: 200px;" onclick="$('#more_page_team_{{$team->id}}').addClass('opened').fadeIn(1000); $('body').addClass('overflow-h');">
                    <article>
                        @if(($team->full_text && isset(json_decode($team->full_text,true)[config('app.locale')])) && strip_tags(json_decode($team->full_text,true)[config('app.locale')]))
                            <a>
                                @endif
                        @if($team->img)
                            <img class="img-responsive" src="{{asset('images/teams/'.$team->img)}}" alt="" >
                        @else
                            <img class="img-responsive" src="{{asset('assets/images/avatar.jpg')}}" alt="" >
                        @endif
                        <h5>{{($team->name && isset(json_decode($team->name,true)[config('app.locale')]))?json_decode($team->name,true)[config('app.locale')]:''}}</h5>
                        <span>{{($team->job_title && isset(json_decode($team->job_title,true)[config('app.locale')]))?json_decode($team->job_title,true)[config('app.locale')]:''}}</span>
                                @if(($team->full_text && isset(json_decode($team->full_text,true)[config('app.locale')])) && strip_tags(json_decode($team->full_text,true)[config('app.locale')]))
                            </a>
                        @endif
                        <p>{!! ($team->intro_text && isset(json_decode($team->intro_text,true)[config('app.locale')]))?json_decode($team->intro_text,true)[config('app.locale')]:'' !!}</p>
                    </article>
                    @if((false && $team->full_text && isset(json_decode($team->full_text,true)[config('app.locale')])) && strip_tags(json_decode($team->full_text,true)[config('app.locale')]))
                        <div class="text-center">
                    <a class="btn btn-1" href="{{url('team/'.$team->id.'-'.\Illuminate\Support\Str::Slug(($team->name && isset(json_decode($team->name,true)[config('app.locale')]))?json_decode($team->name,true)[config('app.locale')]:''))}}">{{__('Read More')}} <i class="fa fa-caret-right"></i></a>
                        </div>
                    @endif
                </div>
                    @endif
                    <div class="read_more_page_team" id="more_page_team_{{$team->id}}">

                        <div class="container">
                            <div class="btn-affix">
                                <button class="btn btn-secondary mb-5" onclick="$('.opened').removeClass('opened'); $('body').removeClass('overflow-h');"><i class="fa fa-times"></i> {{__('Close')}}</button>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-4 text-center">
                                @if($team->img)
                                     <img class="img-responsive" src="{{asset('images/teams/'.$team->img)}}" alt="">
                                @endif
                                    <h4 class="mt-4">{{json_decode($team->name,true)[config('app.locale')]}}
                                        <br>
                                        <small class="text-secondary">{{json_decode($team->job_title,true)[config('app.locale')]}}</small>
                                    </h4>
                                </div>

                                <div class="col">
                                    <p>
                                        {!! json_decode($team->intro_text,true)[config('app.locale')] !!}
                                        {!! json_decode($team->full_text,true)[config('app.locale')] !!}
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

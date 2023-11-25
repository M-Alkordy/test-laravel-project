@extends('site.layouts.master')
@section('title')
    @if(isset($service))
   | {{$service->title[config('app.locale')]}}
    @endif
    @if(isset($logo))
   | {{$logo->title[config('app.locale')]}}
    @endif
    @if(isset($team))
        | {{$team->name[config('app.locale')]}}
    @endif
@endsection
@section('content')
    <div style="background-color:#333; height: 80px; margin-top: -22px; padding: 0px; top:0px"></div>
    @if(isset($service))
        <div class="read_more_page container mt-5" style="min-height: 600px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading text-left margin-bottom-40">
                        <h4>@if($service->icon)<img class="img-responsive" src="{{asset('images/services/icons/'.$service->icon)}}" alt="">@endif {{($service->title)[config('app.locale')]}}</h4>
                    </div>
                    <p>
                        {!! ($service->intro_text)[config('app.locale')] !!}
                        {!! ($service->intro_text)[config('app.locale')] !!}
                    </p>
                </div>


            </div>
            <br>
            {!! ($service->full_text)[config('app.locale')] !!}
        </div>
    @endif
    @if(isset($logo))
        <div class="container mt-5" style="min-height: 600px;">
            <div class="row">
                @if($logo->img)
                    <div class="col-md-4 text-center"> <img style="max-width: 160px;" class="img-responsive" src="{{asset('images/logos//'.$logo->img)}}" alt=""> </div>
                @else
                    <div class="col-1"> </div>
                @endif
                <div class="col">
                    <!-- Heading -->
                    <div class="heading text-left margin-bottom-40">
                        <h4>{{$logo->title[config('app.locale')]}}</h4>
                    </div>
                    <p>
                        {!! ($logo->full_text)[config('app.locale')] !!}
                    </p>
                </div>

            </div>

        </div>
    @endif
    @if(isset($team))
        <div class="container mt-5" style="min-height: 600px;">
            <div class="row">
                @if($team->img)
                    <div class="col-md-4 text-center"> <img style="max-width: 300px; border-radius: 50%; border:solid 1px #ccc;" class="img-responsive" src="{{asset('images/teams/'.$team->img)}}" alt=""> </div>
                @else
                    <div class="col-1"> </div>
                @endif
                <div class="col">
                    <!-- Heading -->
                    <div class="heading text-start margin-bottom-40 mt-2">
                        <h5 style="color:#336699">{{$team->name[config('app.locale')]}}</h5>
                        <p style="color: #339966">{{$team->job_title[config('app.locale')]}}</p>
                    </div>
                    <p>
                        {!! ($team->intro_text)[config('app.locale')] !!}
                        {!! ($team->full_text)[config('app.locale')] !!}
                    </p>
                </div>

            </div>

        </div>
    @endif
@endsection

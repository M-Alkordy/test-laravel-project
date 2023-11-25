@if($section->component)
    <style>
        .owl-dots
        {
            display: none !important;
        }
        .clients .cor-slide
        {
            direction:ltr;
        }
    </style>
    <section id="{{$section->alias}}" class="clients padding-top-10 padding-bottom-30" @if($section->background) style="background: url({{url('images/sections/backgrounds/'.$section->background)}}) center center fixed no-repeat;
    background-size: cover;" @endif>
    <div class="container">

        <!-- Heading -->
        <div class="heading text-center">
            <h4>{{($section->title && json_decode($section->title,true)[config('app.locale')])?json_decode($section->title,true)[config('app.locale')]:''}}</h4>
            <span>{!! ($section->intro_text && json_decode($section->intro_text,true)[config('app.locale')])?json_decode($section->intro_text,true)[config('app.locale')]:'' !!}</span> </div>

        <!-- Clients -->

        <div class="cor-slide">
            @php
            $row = $section->component->row;
            $col = floor(12/$section->component->col);
            $logos_count = $section->component->logos()->where('published',1)->count();
            $slide_count=ceil($logos_count/($section->component->row*$section->component->col));
            $logo_number = 0;
            $j=0;
            @endphp
            @for($i=0;$i<$slide_count;$i++)
            <div class="item">
                <ul class="row">
                    @for($j;$j<(($section->component->col*$section->component->row)*($i+1)); $j++)
                        @php
                        if(!isset($section->component->logos()->where('published',1)->get()[$j]))break;
                        @endphp

                    <li class="col-md-{{$col}}">

                        <a href="{{strip_tags(json_decode($section->component->logos[$j]->full_text,true)[config('app.locale')])?url('company/'.$section->component->logos[$j]->id):'#'}}">

                            <img class="img-responsive" src="{{asset('images/logos/'.$section->component->logos[$j]->img)}}" alt="">

                        </a>
                    </li>
                    @endfor
                </ul>
            </div>
            @endfor
            @if($section->component->logos()->where('published',1)->count()<=($section->component->col*$section->component->row))
                <div class="item">
                </div>
                @endif


        </div>
    </div>


</section>
<script>
    var items = {{$section->component->logos()->where('published',1)->count()}}
</script>
@endif



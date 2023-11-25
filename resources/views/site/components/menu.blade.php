<!-- Navigation -->
<div class="top-bar">
<nav class="navbar">
    <div class="sticky">
        <div class="container">

            <!-- LOGO -->
            <div class="logo"> <a href="{{url('/')}}"><img  class="img-responsive" src="{{asset('assets/images/logo.png')}}" alt="" ></a> </div>

            <!-- Nav -->
            <ul class="nav ownmenu">
                @foreach(config('main_menu') as $menu)
                <li @if($menu['is_home']) class="active" @endif> <a href="{{url("/".$menu['link'])}}">{{json_decode($menu['name'],true)[config('app.locale')]}} </a> </li>
                @endforeach
                <li class="mx-5">
                @if(config('app.locale')=='ar' )
                <a class="bg-white text-secondary" href="{{url('en')}}">En</a>
                @else
                <a class="bg-white text-secondary" href="{{url('ar')}}">عربي</a>
                @endif
                </li>

            </ul>

        </div>
    </div>
</nav>
</div>

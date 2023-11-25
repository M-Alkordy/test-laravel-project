
<!DOCTYPE html>
<html @if(config('app.locale')=='ar' ) dir="rtl" @endif>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Pioneers Network">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;700;800;900&display=swap" rel="stylesheet">
    <title>{{config('app.name')}} @yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.ico')}}">

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('assets/css/font-awesome.min')}}.css" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">

    <!-- Online Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,600,800,200,500' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600italic,400italic,300,300italic,600,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Libre+Baskerville:400italic,400,700' rel='stylesheet' type='text/css'>

    <!-- COLORS -->
    <link rel="stylesheet" id="color" href="{{asset('assets/css/colors/default.css')}}">
    <style>
        .overflow-h
        {
            overflow: hidden;
        }
    </style>
    <!-- JavaScripts -->
    <script src="{{asset('assets/js/modernizr.js')}}"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
@if(config('site_settings.google_analytics_id'))
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{config('site_settings.google_analytics_id')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{config('site_settings.google_analytics_id')}}');
        </script>
    @endif
    <script src="https://www.google.com/recaptcha/api.js?render=6LfKiaggAAAAAJktaZR35nMngOJkvTKy2Thnd7ia"></script>
</head>
<body id="the-body">
@if(session()->has('message'))
    <div id="contact_message" style="position: fixed; top:60px; left:0px; width:100%; z-index: 9999;" class="success-msg"> <i class="fa fa-paper-plane-o"></i>{{session()->get('message')}}</div>
@endif
<!-- Wrap -->
<div id="wrap">

    <!-- header -->
    <header>
        @include('site.components.menu')
    </header>

    @yield('content')
    <footer>
        <div class="container">
        <div class="text-center text-dark">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo"> <a href="http://fshcpa.com"><img class="img-responsive" src="{{asset('/assets/images/logo.png')}}" alt=""></a> </div>
                    <ul class="row mt-4 text-center text-dark">
                        <li class="col"><a href="https://www.linkedin.com/company/fshcpa.com"><i class="fa fa-linkedin"></i></a></li>
                        <li class="col"><a href="https://twitter.com/fshcpa"><i class="fa fa-twitter"></i></a></li>
                        <li class="col"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="col"><a href="#"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-5">

                    <ul class="row contact">
                        <li class="col-md-12"><h6 class="">{{__('Contact Info.')}}:</h6></li>
                        <li class="col-xl-4">
                            {{__('T')}}: <a href="tel:{{config('site_settings.contact.tel')}}"><p style="direction:ltr;">{{config('site_settings.contact.tel')}}</p></a>
                        </li>
                        <li class="col-xl-4">
                            {{__('M')}}: <a  href="tel:{{config('site_settings.contact.mobile')}}"><p style="direction:ltr;">{{config('site_settings.contact.mobile')}}</p></a>
                        </li>
                        <li class="col-xl-4">
                            {{__('E')}}: <a    href="mailto:{{config('site_settings.main_email')}}"><p style="direction:ltr;">{{config('site_settings.main_email')}}</p></a>
                        </li>
                    </ul>

                </div>
            </div>
            <span>{{__('Copyright')}} ©{{date('Y')}} {{__('All rights reserved')}}</span>
            <br>
            <small>{{__('Developed By')}}: <a class="brand text-dark" target="_blank" href="https://pioneers.network">{{__('Pioneers Network')}}</a></small>
        </div>
        </div>
    </footer>
</div>
<script src="{{asset('assets/js/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/own-menu.js')}}"></script>
<script src="{{asset('assets/js/jquery.isotope.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.flexslider-min.js')}}"></script>
<script src="{{asset('assets/js/jquery.countTo.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.cubeportfolio.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.colio.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script>
    $(document).ready(function (){

        $('#service_1').click(function (){
            $('#more_page_1').fadeIn(1000).addClass('opened');
            $('body').addClass('overflow-h');
        });
        $('#service_3').click(function (){
            $('#more_page_2').fadeIn(1000).addClass('opened');
            $('body').addClass('overflow-h');
        });
        $('#service_2').click(function (){
            $('#more_page_3').fadeIn(1000).addClass('opened');
            $('body').addClass('overflow-h');
        });
        $('#service_4').click(function (){
            $('#more_page_4').fadeIn(1000).addClass('opened');
            $('body').addClass('overflow-h');
        });
        if(window.pageYOffset>200)
        {
            $('.navbar').addClass('affix');
            $('.sticky-wrapper').addClass('is-sticky');
        }
        else {
            $('.navbar').removeClass('affix');
            $('.sticky-wrapper').removeClass('is-sticky');
        }
    })
    let section_name="";
    document.addEventListener('scroll', function (event) {
        if(window.pageYOffset>200)
        {
            $('.navbar').addClass('affix');
            $('.sticky-wrapper').addClass('is-sticky');
        }
        else {
            $('.navbar').removeClass('affix');
            $('.sticky-wrapper').removeClass('is-sticky');
        }
    }, true /*Capture event*/);

    $(window).scroll(function() {
        var scrollDistance = $(window).scrollTop();

        // Show/hide menu on scroll
        //if (scrollDistance >= 850) {
        //		$('nav').fadeIn("fast");
        //} else {
        //		$('nav').fadeOut("fast");
        //}

        // Assign active class to nav links while scolling

        $('section').each(function(i) {

            if((Math.round(($(this).position().top-300)/150) === Math.round((scrollDistance)/150)) ||(Math.round(($(this).position().top)/150) === Math.round((scrollDistance)/150)))
            {
                console.log(section_name);
                $('section').removeClass('current');
                $(this).addClass('current');
                section_name=$(this).attr('id');
            }

            if ($(this).position().top <= scrollDistance+50) {

                $('.ownmenu li.active').removeClass('active');
                $('.ownmenu  a[href$="'+$(this).attr('id')+'"]').parent().addClass('active');
            }
        });
    }).scroll();

</script>
<script>

    $(".cor-slide").owlCarousel({
        items :1,
        autoplay:true,
        margin:30,
        nav:false,
        loop:true,
        controlNav:false,
        autoplayTimeout:5000,
        autoplayHoverPause:false,
        navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        animateOut: 'easeIn'
    });
</script>
<script>
    function onSubmit(token) {

        if($("#contact_form")[0].checkValidity())
        document.getElementById("contact_form").submit();
    }
    setTimeout(function (){$('.success-msg').fadeOut(1000)},10000);
</script>

</body>
</html>

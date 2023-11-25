<!DOCTYPE html>
<html lang="en"
      dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots"
          content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css"
          href="{{asset('dashboard-asset/assets/vendor/perfect-scrollbar.css')}}"
          rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css"
          href="{{asset('dashboard-asset/assets/css/app.css')}}"
          rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css"
          href="{{asset('dashboard-asset/assets/css/vendor-material-icons.css')}}"
          rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css"
          href="{{asset('dashboard-asset/assets/css/vendor-fontawesome-free.css')}}"
          rel="stylesheet">


    <!-- Flatpickr -->
    <link type="text/css"
          href="{{asset('dashboard-asset/assets/css/vendor-flatpickr.css')}}"
          rel="stylesheet">
    <link type="text/css"
          href="{{asset('dashboard-asset/assets/css/vendor-flatpickr-airbnb.css')}}"
          rel="stylesheet">
    <!-- Vector Maps -->
    <link type="text/css"
          href="{{asset('dashboard-asset/assets/vendor/jqvmap/jqvmap.min.css')}}"
          rel="stylesheet">
@yield('header')
</head>

<body class="layout-default has-drawer-opened">

<div class="preloader"></div>
<!-- Header Layout -->
<div class="mdk-header-layout js-mdk-header-layout">

    <!-- Header -->

    <div id="header"
         class="mdk-header js-mdk-header m-0"
         data-fixed>
        <div class="mdk-header__content">

            <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-dark  pr-0"
                 id="navbar"
                 data-primary="data-primary">
                <div class="container-fluid p-0">

                    <!-- Navbar toggler -->

                    <button class="navbar-toggler navbar-toggler-right d-block d-lg-none"
                            type="button"
                            data-toggle="sidebar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Navbar Brand -->
                    <a href="{{url('/dashboard')}}"
                       class="navbar-brand ">

                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 25 26" style="enable-background:new 0 0 25 26;" xml:space="preserve">
<style type="text/css">
    svg {
        width: 30px;
    }

    .st0 {
        fill-rule: evenodd;
        clip-rule: evenodd;
        fill: #FFFFFF;
    }
</style>
                            <path class="st0" d="M9.2,1.7c3.1-0.4,6.3,0.2,8.6,2.1c4.2,3.3,4,9.2-0.4,13.1c-3.7,3.3-9.3,4.1-13.5,2.2c3.5,0.7,7.5-0.3,10.3-2.9
	c4.2-3.7,4.3-9.3,0.4-12.5C13.1,2.6,11.2,1.9,9.2,1.7"/>
                            <path class="st0" d="M4.2,9c2-6.1,8-9.8,14.2-8.9c-5.2,0.3-9.9,3.8-11.6,9C4.6,16,8.4,23.3,15.2,25.5c0.7,0.2,1.5,0.4,2.2,0.5
	c-1.6,0.1-3.2-0.1-4.8-0.6C5.7,23.2,2,15.9,4.2,9"/>
                            <path class="st0" d="M9.6,18.7c-1.7-1.2-3-3.1-3.2-5.2c-0.5-3.8,2.3-6.8,6.3-6.9c3.4,0,6.5,2.2,7.6,5.2c-1.4-2-3.8-3.4-6.4-3.3
	c-3.7,0-6.4,3-6,6.5C8,16.4,8.7,17.7,9.6,18.7"/>
                            <path class="st0" d="M8.7,20.2c-1.7,0-3.3-0.3-4.8-1c1.4,0.3,2.8,0.3,4.3,0L8.7,20.2z"/>
</svg>

                        <span>Pioneers CMS</span>
                    </a>

                    <form class="search-form d-none d-sm-flex flex"
                          action="{{url('dashboard/search')}}">
                        <button class="btn"
                                type="submit"><i class="material-icons">search</i></button>
                        <input type="text"
                               class="form-control"
                               placeholder="Search">
                    </form>



                    <ul class="nav navbar-nav d-none d-sm-flex border-left navbar-height align-items-center">
                        <li class="nav-item dropdown">
                            <a href="#account_menu"
                               class="nav-link dropdown-toggle"
                               data-toggle="dropdown"
                               data-caret="false">
                                        <span class="mr-1 d-flex-inline">
                                            <span class="text-light">{{Auth::user()->name}}</span>
                                        </span>
                                <img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}"
                                     class="rounded-circle"
                                     width="32"
                                     alt="Frontted">
                            </a>
                            <div id="account_menu"
                                 class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-item-text dropdown-item-text--lh">
                                    <div><strong>{{Auth::user()->name}}</strong></div>
                                    <div class="text-muted">{{Auth::user()->email}}</div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item active"
                                   href="{{url('/dashboard')}}"><i class="material-icons">dvr</i> Dashboard</a>
                                <a class="dropdown-item"
                                   href="{{url('dashboard/edit-account')}}"><i class="material-icons">edit</i> Edit account</a>
                                <div class="dropdown-divider"></div>
                                <form action="{{url('logout')}}" method="post">
                                    {{csrf_field()}}
                                    <button class="dropdown-item"
                                       ><i class="material-icons">exit_to_app</i> Logout</button>
                                </form>

                            </div>
                        </li>
                    </ul>

                </div>
            </div>

        </div>
    </div>
    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <div class="mdk-drawer-layout js-mdk-drawer-layout"
             data-push
             data-responsive-width="992px">
            <div class="mdk-drawer-layout__content page">
                @yield('content')

            </div>
            <!-- // END drawer-layout__content -->
            @yield('side-menu')
        </div>

    </div>
    <!-- // END header-layout__content -->

</div>

</div>
<!-- // END Header -->
<!-- jQuery -->
<script src="{{asset('dashboard-asset/assets/vendor/jquery.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{asset('dashboard-asset/assets/vendor/popper.min.js')}}"></script>
<script src="{{asset('dashboard-asset/assets/vendor/bootstrap.min.js')}}"></script>

<!-- Perfect Scrollbar -->
<script src="{{asset('dashboard-asset/assets/vendor/perfect-scrollbar.min.js')}}"></script>

<!-- DOM Factory -->
<script src="{{asset('dashboard-asset/assets/vendor/dom-factory.js')}}"></script>

<!-- MDK -->
<script src="{{asset('dashboard-asset/assets/vendor/material-design-kit.js')}}"></script>

<!-- App -->
<script src="{{asset('dashboard-asset/assets/js/toggle-check-all.js')}}"></script>
<script src="{{asset('dashboard-asset/assets/js/check-selected-row.js')}}"></script>
<script src="{{asset('dashboard-asset/assets/js/dropdown.js')}}"></script>
<script src="{{asset('dashboard-asset/assets/js/sidebar-mini.js')}}"></script>
<script src="{{asset('dashboard-asset/assets/js/app.js')}}"></script>


<!-- Flatpickr -->
<script src="{{asset('dashboard-asset/assets/vendor/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('dashboard-asset/assets/js/flatpickr.js')}}"></script>

<!-- Global Settings -->
<script src="{{asset('dashboard-asset/assets/js/settings.js')}}"></script>

<!-- Moment.js -->
<script src="{{asset('dashboard-asset/assets/vendor/moment.min.js')}}"></script>
<script src="{{asset('dashboard-asset/assets/vendor/moment-range.js')}}"></script>

<!-- Chart.js -->
<script src="{{asset('dashboard-asset/assets/vendor/Chart.min.js')}}"></script>



<!-- Vector Maps -->
<script src="{{asset('dashboard-asset/assets/vendor/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('dashboard-asset/assets/vendor/jqvmap/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('dashboard-asset/assets/js/vector-maps.js')}}"></script>
@yield('scripts')
</body>
</html>

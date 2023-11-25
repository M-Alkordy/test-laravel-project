@extends('dashboard.layouts.master')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"
                            aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h1 class="m-0">Dashboard</h1>
            </div>

        </div>
    </div>
    <div class="container-fluid page__container">
        <div class="row card-group-row">
            <div class="col-lg-3 col-md-4 card-group-row__col">
                <div class="card card-group-row__card">
                    <div class="p-2 d-flex flex-row align-items-center">
                        <div class="avatar avatar-xs mr-2">
                                                <span class="avatar-title rounded-circle text-center bg-primary">
                                                    <i class="material-icons text-white icon-18pt">slideshow</i>
                                                </span>
                        </div>
                        <a href="{{url('dashboard/sliders')}}"
                           class="text-dark">
                            <strong>Sliders</strong>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 card-group-row__col">
                <div class="card card-group-row__card">
                    <div class="p-2 d-flex flex-row align-items-center">
                        <div class="avatar avatar-xs mr-2">
                                                <span class="avatar-title rounded-circle text-center bg-primary">
                                                    <i class="material-icons text-white icon-18pt">description</i>
                                                </span>
                        </div>
                        <a href="{{url('dashboard/services')}}"
                           class="text-dark">
                            <strong>Services</strong>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 card-group-row__col">
                <div class="card card-group-row__card">
                    <div class="p-2 d-flex flex-row align-items-center">
                        <div class="avatar avatar-xs mr-2">
                                                <span class="avatar-title rounded-circle text-center">
                                                    <i class="material-icons text-white icon-18pt">person_add</i>
                                                </span>
                        </div>
                        <a href="{{url('dashboard/teams')}}"
                           class="text-dark">
                            <strong>Team</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('side-menu')
@include('dashboard.components.side-menu')
@endsection

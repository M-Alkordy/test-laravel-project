@extends('dashboard.layouts.master')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item "
                            aria-current="page">Menu</li>
                        <li class="breadcrumb-item active"
                            aria-current="page">Select Menu Type</li>
                    </ol>
                </nav>
                <h1 class="m-0">Menu Type</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid page__container">
        <div class="row">
            <div class="col-md-3 mb-3">
                <a href="{{url('dashboard/menus/create?type=Section')}}" class="btn btn-outline-secondary btn-block" style="height: 150px; padding-top:50px;" >Section <br> <i class="material-icons">view_day</i></a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{url('dashboard/menus/create?type=Service')}}" class="btn btn-outline-secondary btn-block" style="height: 150px; padding-top:50px;" >Service <br> <i class="material-icons">description</i></a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{url('dashboard/menus/create?type=Team')}}" class="btn btn-outline-secondary btn-block" style="height: 150px; padding-top:50px;" >Team <br> <i class="material-icons">person</i></a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{url('dashboard/menus/create?type=Contact')}}" class="btn btn-outline-secondary btn-block" style="height: 150px; padding-top:50px;" >Contact <br> <i class="material-icons">call</i></a>
            </div>

        </div>
    </div>
@endsection

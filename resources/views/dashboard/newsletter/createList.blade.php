@extends('dashboard.layouts.master')
@section('header')
    <!-- Quill Theme -->
    <link type="text/css"
          href="{{asset('dashboard-asset/assets/css/vendor-quill.css')}}"
          rel="stylesheet">
    <style>
        .ql-omega:after {
            content: "+";
        }
        .full_screen
        {
            position:fixed;
            top:0px;
            left: 0px;
            width:100vw;
            max-width: 82vw;
            height: 100vh;
            z-index: 999;
            transition: 0.5s all;
        }
        #icon-upload,#img-upload
        {
            padding:65px 0px;
            min-width: 100px;
            width: 150px;
            height: 150px;
            border:1px solid #ccc;
            border-radius: 50%;
            text-align: center;
            background-color: #eee;
            margin-bottom: 20px;
            background-size: cover !important;
            background-repeat: no-repeat !important;
            background-position-x: 50% !important;

        }
        #icon-upload label,#img-upload label
        {
            font-size: 12px;
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <div class="mdk-drawer-layout__content page">

        <div class="container-fluid page__heading-container">
            <div class="page__heading">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>

                        <li class="breadcrumb-item"><a href="{{url('dashboard/teams')}}">Newsletter</a></li>
                        @if($list->id)
                            <li class="breadcrumb-item active"
                                aria-current="page">Edit Subscribers List</li>
                        @else
                            <li class="breadcrumb-item active"
                                aria-current="page">New Subscribers List</li>
                        @endif
                    </ol>
                </nav>
                @if($list->id)
                    <h1 class="m-0">Edit Subscribers List</h1>
                @else
                    <h1 class="m-0">New Subscribers List</h1>
                @endif
            </div>
        </div>

        <div class="container-fluid page__container">
            <form action="{{url('dashboard/subscribers-list')}}" method="post" id="post-form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$list->id}}">
                <div class="card card-form">
                    <div class="row">
                        <div class="col-lg-9 card-form__body card-body">

                            <div class="was-validated">
                                <label for="validationSample01">Name</label>
                                <div class="form-row">
                                    <div class="col-12 col-md-12 mb-3">
                                        <input type="text"
                                               class="form-control"
                                               id="validationSample01"
                                               placeholder="Name"
                                               name="name"
                                               value="{{$list->name}}"
                                               required="">
                                        <div class="invalid-feedback">Please provide a name.</div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    
                                </div>
                                
                                <label>Description</label>
                                <div class="form-row mb-3">
                                    <div class="col-12 col-md-12">
                                        <textarea type="hidden" name="description" class="form-control" style="height:200px;">{!! $list->description !!}</textarea>
                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <button class="btn btn-primary"
                                    type="submit">
                                @if($list->id)
                                    Update
                                @else
                                    Save
                                @endif
                            </button>
                            <a href="{{url('dashboard/subscribers-list')}}" class="btn btn-secondary">Cancel</a>

                        </div>
                        <div  class="col-lg-3 card-form__body card-body">
                        <div class="custom-control custom-checkbox mt-4">
                            <input class="custom-control-input"
                                   type="checkbox"
                                   name="published"
                                   value="1"
                                   id="invalidCheck01"
                                   @if($list->published)
                                   checked
                                   @endif
                            >
                            <label class="custom-control-label"
                                   for="invalidCheck01">
                                Published
                            </label>
                        </div>
                        </div>
                        

                    </div>

                </div>
            </form>
        </div>

    </div>
@endsection
@section('scripts')
    <!-- Quill -->
    <script src="{{asset('dashboard-asset/assets/vendor/quill.min.js')}}"></script>
    <script src="{{asset('dashboard-asset/assets/js/quill.js')}}"></script>
    
@endsection
@section('scripts')
    <!-- List.js -->
    <script src="{{asset('dashboard-asset/assets/vendor/list.min.js')}}"></script>
    <script src="{{asset('dashboard-asset/assets/js/list.js')}}"></script>
@endsection
@section('side-menu')
    @include('dashboard.components.side-menu')
@endsection

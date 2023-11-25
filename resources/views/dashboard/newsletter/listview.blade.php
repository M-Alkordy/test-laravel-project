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
                                aria-current="page">Subscribers List</li>
                        
                        @endif
                    </ol>
                </nav>
                @if($list->id)
                    <h1 class="m-0">{{$list->name}}</h1>
                    <p>{!! $list->description !!}</p>
                @endif
            </div>
        </div>
        <div class="">
            <nav class="navbar nav bg-dark text-white">
                <ul class="nav">
                    <li class="menu-item px-2 mx-2" >
                        <a href={{"/dashboard/".$list->id."/subcribers/create"}} style="text-decoration:none;">
                        New Subscriber
                    </a>
                    </li>
                    <li class="menu-item px-2 mx-2">
                    <form method="POST" action="{{ url('dashboard/'.$list->id.'/subcribers-uplaod') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" required>
                        <button class="btn btn-link" href="#" style="text-decoration:none;">
                        upload Subscribers
    </button>
    </form>
                    </li>
    </ul>
            </nav>
    </div>

        <div class="container-fluid page__container">
        <div class="table-responsive border-bottom mt-4"
             data-toggle="lists"
             data-lists-values='["service-name"]'>

            

            <table class="table mb-0 thead-border-top-0">
                <thead>
                <tr>

                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>subscribed</th>
                    <th>Created At</th>
                    <th style="width: 24px;"></th>
                </tr>
                </thead>
                <tbody class="list"
                       id="staff02">
                @foreach($list->subscribers as $sub)
                    <tr>

                        <td>

                            <span class="service-name"><a href="{{url('dashboard/subscribers/'.$sub->id)}}">{{$sub->name }}</a></span>

                        </td>
                        <td>
                            {{$sub->email}}
                        </td>
                        <td>
                            @if($sub->published)
                                <span class="badge badge-success">Published</span>
                            @else
                                <span class="badge badge-danger">Not Published</span>
                            @endif
                        </td>
                        <td>
                            @if($sub->subscribed)
                                <span class="badge badge-success">subscribed</span>
                            @else
                                <span class="badge badge-danger">Not subscribe</span>
                            @endif
                        </td>
                        <td>{{$sub->created_at->format('d/m/Y') }}</td>
                        <td style="width: 24px;">

                            <div class="dropdown">
                                <button  id="dropdown-{{$list->id}}"
                                         class=" btn btn-link text-muted dropdown-toggle" data-toggle="dropdown" data-caret="false" aria-expanded="true"><i class="material-icons">more_vert</i></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-{{$list->id}}">
                                <li>
                                        
                                            <a href="{{url('dashboard/'.$list->id.'/subcribers/'.$sub->id.'/edit')}}" class="btn btn-block text-info"><i class="fa fa-trash-alt"></i> Edit</a>
                                        
                                    </li>    
                                <li>
                                        <form action="{{url('dashboard/'.$list->id.'/subcribers/'.$sub->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-block text-danger"><i class="fa fa-trash-alt"></i> Delete</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>

                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div> 
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

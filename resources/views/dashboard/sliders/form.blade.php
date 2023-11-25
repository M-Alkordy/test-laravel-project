@extends('dashboard.layouts.master')
@section('content')
    <div class="mdk-drawer-layout__content page">

        <div class="container-fluid page__heading-container">
            <div class="page__heading">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>

                            <li class="breadcrumb-item"><a href="{{url('dashboard/sliders')}}">Sliders</a></li>
                        @if($slider->id)
                        <li class="breadcrumb-item active"
                            aria-current="page">Edit Slider</li>
                        @else
                            <li class="breadcrumb-item active"
                                aria-current="page">New Slider</li>
                            @endif
                    </ol>
                </nav>
                @if($slider->id)
                    <h1 class="m-0">Edit Slider</h1>
                @else
                    <h1 class="m-0">New Slider</h1>
                @endif
            </div>
        </div>

    <div class="container-fluid page__container">
        <form action="{{url('dashboard/sliders')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$slider->id}}">
        <div class="card card-form">
            <div class="row">
                <div class="col-lg-9 card-form__body card-body">

                        <div class="was-validated">
                            <div class="form-row">
                                <div class="col-12 col-md-12 mb-3">
                                    <label for="validationSample01">Name</label>
                                    <input type="text"
                                           class="form-control"
                                           id="validationSample01"
                                           placeholder="name"
                                           name="name"
                                           value="{{$slider->name}}"
                                           required="">
                                    <div class="invalid-feedback">Please provide a name for slider.</div>
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary"
                                type="submit">
                            @if($slider->id)
                                Update
                            @else
                            Save
                                @endif
                        </button>

                </div>
                <div class="col-12 col-lg-3 mt-2 pt-5">
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input"
                                   type="checkbox"
                                   name="published"
                                   value="1"
                                   id="invalidCheck01"
                                   @if($slider->published)
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

        </div>
        </form>
        @if($slider->id)
        <div class="card">
            <div class="card-header">
                <h3 class="card-title float-left">Slides</h3>
                <div class="float-end">
                    <a href="{{url('dashboard/sliders/'.$slider->id.'/slides/create')}}" class="btn btn-primary float-right">Add Slide</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive border-bottom"
                     data-toggle="lists"
                     data-lists-values='["slide-name"]'>

                    <div class="search-form search-form--light m-3">
                        <input type="text"
                               class="form-control search"
                               placeholder="Search">
                        <button class="btn"
                                type="button"><i class="material-icons">search</i></button>
                    </div>

                    <table class="table mb-0 thead-border-top-0">
                        <thead>
                        <tr>

                            <th></th>
                            <th>Name</th>
                            <th>Ordering</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th style="width: 24px;"></th>
                        </tr>
                        </thead>
                        <tbody class="list"
                               id="staff02">
                        @foreach($slider->slides()->orderBy('ordering')->get() as $slide)
                            <tr>
                                <td>
                                    <div style="max-width: 100px;">
                                    @if($slide->img)
                                        <img class="avatar rounded" src="{{asset('images/slides/'.$slide->img)}}">
                                    @else
                                        <img class="avatar rounded" src="{{asset('dashboard-asset/assets/images/login/alexandre-godreau-431553-unsplash.jpg')}}">
                                    @endif
                                    </div>
                                </td>

                                <td>

                                    <span class="slide-name"><a href="{{url('dashboard/sliders/'.$slider->id.'/slides/'.$slide->id.'/edit')}}">{{$slide->name}}</a></span>

                                </td>
                                <td>{{$slide->ordering}}</td>


                                <td>
                                    @if($slide->published)
                                        <span class="badge badge-success">Published</span>
                                    @else
                                        <span class="badge badge-danger">Not Published</span>
                                    @endif
                                </td>
                                <td>{{$slide->created_at->format('d/m/Y') }}</td>
                                <td style="width: 24px;">

                                    <div class="dropdown">
                                        <button  id="dropdown-{{$slide->id}}"
                                                 class=" btn btn-link text-muted dropdown-toggle" data-toggle="dropdown" data-caret="false" aria-expanded="true"><i class="material-icons">more_vert</i></button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdown-{{$slide->id}}">
                                            <li>
                                                <form action="{{url('dashboard/sliders/'.$slider->id.'/slides/'.$slide->id)}}" method="post">
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
            @endif
    </div>

    </div>
@endsection
@section('scripts')
    <!-- List.js -->
    <script src="{{asset('dashboard-asset/assets/vendor/list.min.js')}}"></script>
    <script src="{{asset('dashboard-asset/assets/js/list.js')}}"></script>
@endsection
@section('side-menu')
    @include('dashboard.components.side-menu')
@endsection

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
            border-radius: 10px;
            text-align: center;
            background-color: #eee;
            margin-bottom: 20px;
            background-size: contain !important;
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

                        <li class="breadcrumb-item"><a href="{{url('dashboard/menus')}}">Menus</a></li>
                        @if($menu->id)
                            <li class="breadcrumb-item active"
                                aria-current="page">Edit Menu Item</li>
                        @else
                            <li class="breadcrumb-item active"
                                aria-current="page">New Menu Item</li>
                        @endif
                    </ol>
                </nav>
                @if($menu->id)
                    <h1 class="m-0">Edit Menu Item</h1>
                @else
                    <h1 class="m-0">New Menu Item</h1>
                @endif
            </div>
        </div>

        <div class="container-fluid page__container">
            <form action="{{url('dashboard/menus')}}" method="post" id="post-form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$menu->id}}">
                <input type="hidden" name="menu_type" value="{{$type}}">
                <div class="card card-form">
                    <div class="row">
                        <div class="col-lg-9 card-form__body card-body">

                            <div class="was-validated">
                                <label for="validationSample01">Name</label>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <input type="text"
                                               class="form-control"
                                               id="validationSample01"
                                               placeholder="English"
                                               name="name[en]"
                                               value="{{($menu->name && isset($menu->name['en']))?$menu->name['en']:''}}"
                                               required="">
                                        <div class="invalid-feedback">Please provide a English name for menu item.</div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <input type="text"
                                               class="form-control"
                                               id="validationSample01"
                                               placeholder="Arabic"
                                               name="name[ar]"
                                               value="{{($menu->name && isset($menu->name['ar']))?$menu->name['ar']:''}}"
                                               required="">
                                        <div class="invalid-feedback">Please provide a Arabic name for menu item.</div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>




                            </div>

                            <button class="btn btn-primary"
                                    type="submit">
                                @if($menu->id)
                                    Update
                                @else
                                    Save
                                @endif
                            </button>
                            <a href="{{url('dashboard/menus')}}" class="btn btn-secondary">Cancel</a>

                        </div>
                        <div class="col-12 col-lg-3 mt-2 pt-5 card-form__body card-body">
                            <div class="form-group">
                                <label>Parent Menu</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Root Menu</option>
                                    @foreach($parents as $parent)
                                        <option @if($menu->parent_id==$parent->id) selected @endif value="{{$parent->id}}">{{json_decode($parent->name,true)[config('app.locale')]}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($type=='Section')
                                <div class="form-group">
                                    <label>Section</label>
                                <select class="form-control" name="component_id" required>
                                    <option value="">-- Select One --</option>
                                    @foreach(App\Models\Section::where('published',1)->orderBy('ordering')->get() as $section)
                                        <option value="{{$section->id}}">{{json_decode($section->title,true)['en']}}</option>
                                    @endforeach
                                </select>
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Ordering</label>
                                <input type="number" class="form-control" name="ordering" value="{{$menu->ordering?$menu->ordering:0}}">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input"
                                           type="checkbox"
                                           name="published"
                                           value="1"
                                           id="invalidCheck01"
                                           @if($menu->published)
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
        </div>

    </div>
@endsection
@section('scripts')

@endsection

@section('side-menu')
    @include('dashboard.components.side-menu')
@endsection

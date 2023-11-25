@extends('dashboard.layouts.master')
@section('content')

    <style>
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
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"
                            aria-current="page">Site Settings</li>
                    </ol>
                </nav>
                <h1 class="m-0">Site Settings</h1>
            </div>

        </div>
    </div>
    <div class="container-fluid page__container">

        <form action="{{url('dashboard/settings/save')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="card card-form">
            <div class="row">
                <div class="col-lg-9 card-form__body card-body">
                    <label>Site Name</label>
                    <div class="form-row">
                        <div class="col-md-6">
                            <input class="form-control" name="name[en]" value="{{$settings?$settings->name['en']:null}}" placeholder="English" required>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" name="name[ar]" value="{{$settings?$settings->name['en']:null}}" placeholder="Arabic" required>
                        </div>
                    </div>
                    <label>Site Description</label>
                    <div class="form-row">
                        <div class="col-md-6">
                            <textarea class="form-control" name="description[en]" placeholder="English">{{$settings?$settings->description['en']:null}}</textarea>
                        </div>
                        <div class="col-md-6">
                            <textarea class="form-control" name="description[ar]" placeholder="Arabic">{{$settings?$settings->description['en']:null}}</textarea>
                        </div>
                    </div>
                    <label>Keywords</label>
                    <br>
                    <small>Separate keywords with (,)</small>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea class="form-control" name="keywords">{!! $settings?$settings->keywords:null !!}</textarea>
                        </div>
                    </div>
                    <label>Colors</label>
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <label>Primary Color</label>
                            <input class="form-control" type="color" name="primary_color" value="{{$settings?$settings->primary_color:'#336699'}}">
                        </div>
                        <div class="col-md-6">
                            <label>Secondary Color</label>
                            <input class="form-control" type="color" name="secondary_color" value="{{$settings?$settings->secondary_color:'#339933'}}">
                        </div>
                    </div>
                    <label>Contracts</label>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Main Email</label>
                            <input class="form-control" type="email" name="main_email" value="{{$settings?$settings->main_email:null}}" required>
                        </div>
                        <div class="col-md-4">
                            <label>Telephone</label>
                            <input class="form-control" type="text" name="contact[tel]" value="{{($settings && isset($settings->contact['tel']))?$settings->contact['tel']:''}}" required>
                        </div>
                        <div class="col-md-4">
                            <label>Mobile</label>
                            <input class="form-control" type="text" name="contact[mobile]" value="{{($settings && isset($settings->contact['mobile']))?$settings->contact['mobile']:''}}" required>
                        </div>
                        <div class="col-md-12">
                            <label>Address</label>
                            <textarea class="form-control" name="address"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 card-form__body card-body">
                    <div class="form-group">
                        <input id="img_upload" type="file" name="img_upload" style="display: none;">
                        <div id="img-upload" onclick="$('#img_upload').click()">
                            <label>Click to upload image</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input"
                                   type="checkbox"
                                   name="online"
                                   value="1"
                                   id="invalidCheck01"
                                   @if($settings?$settings->online:false)
                                   checked
                                @endif
                            >
                            <label class="custom-control-label"
                                   for="invalidCheck01">
                                Online
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Google Analytics</label>
                        <input class="form-control" type="text" name="google_analytics_id" placeholder="G-XXXXXXXX" value="{{$settings?$settings->google_analytics_id:null}}">
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-2">
                <button class="btn btn-primary"
                        typ="submit">
                    Save
                </button>
            </div>
        </div>

        </form>
    </div>
@endsection
@section('scripts')
    <script>
        function readURL(input, temp) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    temp.fadeOut(1, function(){
                        $(this).attr('style', 'background:  url('+e.target.result+');');
                        $(this).fadeOut(500);
                        $(this).fadeIn(500);
                    });
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#img_upload').on('change',function(){
            var temp = $('#img-upload');
            readURL(this,temp);
        })
    </script>
@endsection
@section('side-menu')
    @include('dashboard.components.side-menu')
@endsection

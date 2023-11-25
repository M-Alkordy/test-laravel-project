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
        .logo-img
        {
            width: 150px;
            min-height: 150px;
            background: #eee;
            border:1px solid #ccc;
            border-radius: 10px;
            background-repeat: no-repeat;
            background-size: cover !important;
            text-align: center;
        }
        .logo-img .img-label
        {

            text-align: center;
            cursor: pointer;

        }
        .logo-img label {
            margin-bottom: 30px;
            font-size: 12px;
            text-align: center;
            margin-top: 30px;

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

                        <li class="breadcrumb-item"><a href="{{url('dashboard/logo-groups')}}">Logo Group</a></li>
                        <li class="breadcrumb-item">Logos</li>
                        @if($logo->id)
                            <li class="breadcrumb-item active"
                                aria-current="page">Edit Logo</li>
                        @else
                            <li class="breadcrumb-item active"
                                aria-current="page">New Logo</li>
                        @endif
                    </ol>
                </nav>
                @if($logo->id)
                    <h1 class="m-0">Edit Logo</h1>
                @else
                    <h1 class="m-0">New Logo</h1>
                @endif
            </div>
        </div>

        <div class="container-fluid page__container">
            <form action="{{url('dashboard/logo-groups/'.$logo_group_id.'/logos')}}" method="post" id="post-form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="logo_group_id" value="{{$logo_group_id}}">
                <input type="hidden" name="id" value="{{$logo->id}}">
                <div class="card card-form">
                    <div class="row">
                        <div class="col-lg-9 card-form__body card-body">

                            <div class="was-validated">
                                <label for="validationSample01">Title</label>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <input type="text"
                                               class="form-control"
                                               id="$logo-title-input"
                                               placeholder="English"
                                               name="title[en]"
                                               value="{{($logo->title && isset($logo->title['en']))?$logo->title['en']:''}}"
                                               required="">
                                        <div class="invalid-feedback">Please provide a English Title for Logo.</div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <input type="text"
                                               class="form-control"
                                               id="validationSample01"
                                               placeholder="Arabic"
                                               name="title[ar]"
                                               value="{{($logo->title && isset($logo->title['ar']))?$logo->title['ar']:''}}"
                                               required="">
                                        <div class="invalid-feedback">Please provide a Arabic Title for Logo.</div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <label for="validationSample01">Full Text</label>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <textarea style="display: none;" type="hidden" name="full_text[en]" id="description_en"></textarea>
                                        <div style="min-height: 150px; max-height: 75%;" id="description-en-div">
                                            {!!  ($logo->full_text && isset($logo->full_text['en']))?$logo->full_text['en']:'' !!}
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <textarea style="display: none;" type="hidden" name="full_text[ar]" id="description_ar"></textarea>
                                        <div style="min-height: 150px; max-height: 75%;" id="description-ar-div">
                                            {!!  ($logo->full_text && isset($logo->full_text['ar']))?$logo->full_text['ar']:'' !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-12">
                                    <button class="btn btn-primary"
                                            type="submit">
                                        @if($logo->id)
                                            Update
                                        @else
                                            Save
                                        @endif
                                    </button>
                                </div>
                            </div>


                        </div>

                        <div class="col-12 col-lg-3 card-form__body card-body">
                            <div class="col-12">
                                <input type="file" name="img_upload" id="img-upload" style="display: none;">
                                <div class="logo-img" onclick="$('#img-upload').click()" style="background: @if($logo->img)url({{asset('images/logos/'.$logo->img)}})@endif;">
                                    <label id="logo-title" class="img-label">Click to upload image</label>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="link_value">Ordering</label>
                                <input type="number" id="link_type" class="form-control" name="ordering" value="{{$logo->ordering?$logo->ordering:1}}" >
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input"
                                           type="checkbox"
                                           name="published"
                                           value="1"
                                           id="invalidCheck01"
                                           @if($logo->published)
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
    <!-- Quill -->
    <script src="{{asset('dashboard-asset/assets/vendor/quill.min.js')}}"></script>
    <script src="{{asset('dashboard-asset/assets/js/quill.js')}}"></script>
    <script>
        let quill_ar="";
        let quill_en="";


        $(document).ready(function (){
            if($('#link_type').val()=='link')
            {
                $('.link_value_div').fadeIn(500).prop('required',true);
            }
            else
            {
                $('.link_value_div').val('');
            }

            quill_en = new Quill('#description-en-div', {
                modules: {
                    toolbar: [
                        [{ header: [1, 2, 3, 4, 5, 6,  false] }],
                        ['bold', 'italic', 'underline','strike',{'color':['#336699','#339933','#333333','#000000','#ffffff']},{'background':['#336699','#339933','#333333','#000000','#ffffff']}],
                        ['image', 'code-block'],
                        ['link'],
                        [{ 'script': 'sub'}, { 'script': 'super' }],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        ['clean'],
                        ['omega']
                    ]
                },
                placeholder: 'English',
                theme: 'snow'  // or 'bubble'
            })
            quill_ar = new Quill('#description-ar-div', {
                modules: {
                    toolbar: [
                        [{ header: [1, 2, 3, 4, 5, 6,  false] }],
                        ['bold', 'italic', 'underline','strike',{'color':['#336699','#339933','#333333','#000000']},{'background':['#336699','#339933','#333333','#000000','#ffffff']}],
                        ['image', 'code-block'],
                        ['link'],
                        [{ 'script': 'sub'}, { 'script': 'super' }],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        ['clean'],
                        ['omega']
                    ]
                },
                placeholder: 'Arabic',
                theme: 'snow'  // or 'bubble'
            });

            let customButton = $('.ql-omega');
            customButton.click(function (){

                if($(this).parent().parent().parent().children()[0].id=='description_en')
                {
                    if($('.full_screen')[0])
                    {
                        $(this).parent().parent().parent().removeClass('full_screen');
                    }
                    else
                    {
                        $(this).parent().parent().parent().addClass('full_screen');
                    }
                }
                else
                {
                    if($('.full_screen')[0])
                    {
                        $(this).parent().parent().parent().removeClass('full_screen');
                    }
                    else
                    {
                        $(this).parent().parent().parent().addClass('full_screen');

                    }
                }

            })

        })

        $('#post-form').submit(function (e){
            e.preventDefault();
            $('#description_en').val(quill_en.root.innerHTML);
            $('#description_ar').val(quill_ar.root.innerHTML);
            setTimeout(function (){
                $('#post-form')[0].submit();
            },500)


        });

        function readURL(input, temp) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    temp.fadeOut(1, function(){
                        $(this).attr('style', 'background: url('+e.target.result+');');
                        $(this).fadeOut(500);
                        $(this).fadeIn(500);
                    });
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#img-upload').on('change',function(){
            var temp = $('.logo-img');
            readURL(this,temp);
        })


    </script>
@endsection
@section('side-menu')
    @include('dashboard.components.side-menu')
@endsection

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
        .slide-img
        {
            width: 100%;
            min-height: 300px;
            background: linear-gradient(to right bottom, rgba(51, 153, 51, 0.5), rgba(0, 102, 153, 0.5), rgba(0, 102, 153, 0.5), rgba(0, 102, 153, 0.5));
            border:1px solid #ccc;
            border-radius: 10px;
            background-repeat: no-repeat;
            background-size: cover !important;
        }
        .slide-img .img-label
        {

            text-align: center;
            cursor: pointer;

        }
        .slide-img h1 {
            margin-bottom: 30px;
            font-size: 40px;
            font-family: 'montserratlight';
            letter-spacing: 5px;
            color: #fff !important;
            margin-top: 30px;

        }
        .slide-img h5 {
            font-size: 18px;
            font-family: 'montserratlight';
            letter-spacing: 9px;
            color: #fff;

            text-align: center;

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

                        <li class="breadcrumb-item"><a href="{{url('dashboard/sliders')}}">Sliders</a></li>
                        <li class="breadcrumb-item">Slides</li>
                        @if($slide->id)
                            <li class="breadcrumb-item active"
                                aria-current="page">Edit Slide</li>
                        @else
                            <li class="breadcrumb-item active"
                                aria-current="page">New Slide</li>
                        @endif
                    </ol>
                </nav>
                @if($slide->id)
                    <h1 class="m-0">Edit Slide</h1>
                @else
                    <h1 class="m-0">New Slide</h1>
                @endif
            </div>
        </div>

        <div class="container-fluid page__container">
            <form action="{{url('dashboard/sliders/'.$slider_id.'/slides')}}" method="post" id="post-form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="slider_id" value="{{$slider_id}}">
                <input type="hidden" name="id" value="{{$slide->id}}">
                <div class="card card-form">
                    <div class="row">
                        <div class="col-lg-9 card-form__body card-body">

                            <div class="was-validated">
                                <label for="validationSample01">Title</label>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <input type="text"
                                               class="form-control"
                                               id="slide-title-input"
                                               placeholder="English"
                                               name="title[en]"
                                               value="{{($slide->title && isset($slide->title['en']))?$slide->title['en']:''}}"
                                               required="">
                                        <div class="invalid-feedback">Please provide a English Title for Slide.</div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <input type="text"
                                               class="form-control"
                                               id="validationSample01"
                                               placeholder="Arabic"
                                               name="title[ar]"
                                               value="{{($slide->title && isset($slide->title['ar']))?$slide->title['ar']:''}}"
                                               required="">
                                        <div class="invalid-feedback">Please provide a Arabic Title for Slide.</div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <label for="validationSample01">Description</label>
                                <div class="form-row">

                                    <div class="col-12 col-md-6 mb-3">
                                        <button type="button" class="btn" onclick="$('#description-en-div').toggle(100); $('#description_en').toggle(100); fill_textarea()">Disable Editor</button>
                                        <textarea style="display: none; min-height: 200px;" class="form-control" type="hidden" name="description[en]" id="description_en">{!!  ($slide->description && isset($slide->description['en']))?$slide->description['en']:'' !!}</textarea>
                                        <div style="min-height: 150px; max-height: 75%;" id="description-en-div">
                                            {!!  ($slide->description && isset($slide->description['en']))?$slide->description['en']:'' !!}
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                    <button type="button" class="btn" onclick="$('#description-ar-div').toggle(100); $('#description_ar').toggle(100); fill_textarea()">Disable Editor</button>
                                        <textarea style="display: none; min-height: 200px;" class="form-control" type="hidden" name="description[ar]" id="description_ar">{!!  ($slide->description && isset($slide->description['ar']))?$slide->description['ar']:'' !!}</textarea>
                                        <div style="min-height: 150px; max-height: 75%;" id="description-ar-div">
                                            {!!  ($slide->description && isset($slide->description['ar']))?$slide->description['ar']:'' !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12">
                                    <input type="file" name="image" id="img-upload" style="display: none;">
                                    <div class="slide-img" onclick="$('#img-upload').click()" style="background: linear-gradient(to right bottom, rgba(51, 153, 51, 0.5), rgba(0, 102, 153, 0.5), rgba(0, 102, 153, 0.5), rgba(0, 102, 153, 0.5))@if($slide->img),url({{asset('images/slides/'.$slide->img)}})@endif;">
                                        <h1 id="slide-title" class="img-label">Click to upload image</h1>
                                        <h5 id="slide-description">Description will shown here</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12">
                                    <button class="btn btn-primary"
                                            type="submit">
                                        @if($slide->id)
                                            Update
                                        @else
                                            Save
                                        @endif
                                    </button>
                                </div>
                            </div>


                        </div>

                        <div class="col-12 col-lg-3 card-form__body card-body">
                            <div class="form-group">
                                <label for="link_type">Link Type</label>
                                <select id="link_type" class="form-control" name="link_type" onchange="$(this).val()=='link'?$('.link_value_div').fadeIn(500).prop('required',true):$('.link_value_div').fadeOut(500).prop('required',false);">
                                    <option value="" >None</option>
                                    <option value="link" @if($slide->link_type=='link') selected @endif>Link</option>
                                </select>
                            </div>
                            <div>
                            <div  class="form-group link_value_div" style="display: none">
                                <label for="link_value">Link Value</label>
                                <input type="url" placeholder="https://"  class="form-control link_value_div" name="link_value" value="{{$slide->link_value}}" >
                            </div>
                            <div class="form-group link_value_div" style="display:none;">
                                <label for="link_value">Link Text</label>
                                <input type="text" placeholder="Ex: Click Here"  class="form-control link_value_div" name="link_text" value="{{$slide->link_text}}">
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="link_value">Ordering</label>
                                <input type="number" id="link_type" class="form-control" name="ordering" value="{{$slide->ordering?$slide->ordering:1}}" >
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input"
                                           type="checkbox"
                                           name="published"
                                           value="1"
                                           id="invalidCheck01"
                                           @if($slide->published)
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
                        ['bold', 'italic', 'underline','strike',{'color':['#336699','#339933','#333333','#000000','#ffffff']},{'background':['#336699','#339933','#333333','#000000','#ffffff']}],
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
            $('#description-en-div').keyup(function (){
                $('#slide-description').html(quill_en.root.innerHTML);
            });
            $('#slide-title-input').keyup(function(){
                $('#slide-title').html($(this).val());
            })
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
                if(!$('#description_en').val())
                $('#description_en').val(quill_en.root.innerHTML);
                if(!$('#description_ar').val())
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
                        $(this).attr('style', 'background: linear-gradient(to right bottom, rgba(51, 153, 51, 0.5), rgba(0, 102, 153, 0.5), rgba(0, 102, 153, 0.5), rgba(0, 102, 153, 0.5)) , url('+e.target.result+');');
                        $(this).fadeOut(500);
                        $(this).fadeIn(500);
                    });
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#img-upload').on('change',function(){
            var temp = $('.slide-img');
            readURL(this,temp);
        })


    </script>
@endsection
@section('side-menu')
    @include('dashboard.components.side-menu')
@endsection

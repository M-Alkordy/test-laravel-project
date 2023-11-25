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

                        <li class="breadcrumb-item"><a href="{{url('dashboard/teams')}}">Team</a></li>
                        @if($team->id)
                            <li class="breadcrumb-item active"
                                aria-current="page">Edit Team Member</li>
                        @else
                            <li class="breadcrumb-item active"
                                aria-current="page">New Team Member</li>
                        @endif
                    </ol>
                </nav>
                @if($team->id)
                    <h1 class="m-0">Edit Team Member</h1>
                @else
                    <h1 class="m-0">New Team Member</h1>
                @endif
            </div>
        </div>

        <div class="container-fluid page__container">
            <form action="{{url('dashboard/teams')}}" method="post" id="post-form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$team->id}}">
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
                                               value="{{($team->name && isset($team->name['en']))?$team->name['en']:''}}"
                                               required="">
                                        <div class="invalid-feedback">Please provide a English name.</div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <input type="text"
                                               class="form-control"
                                               id="validationSample01"
                                               placeholder="Arabic"
                                               name="name[ar]"
                                               value="{{($team->name && isset($team->name['ar']))?$team->name['ar']:''}}"
                                               required="">
                                        <div class="invalid-feedback">Please provide a Arabic name.</div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <label>Job Title</label>
                                <div class="form-row mb-3">
                                    <div class="col-12 col-md-6">
                                        <input type="text" name="job_title[en]" class="form-control" value="{!! ($team->job_title && isset($team->job_title['en']))?$team->job_title['en']:'' !!}" required>
                                        <div class="invalid-feedback">Please provide a English Job Title.</div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" name="job_title[ar]" class="form-control" value="{!! ($team->job_title && isset($team->job_title['ar']))?$team->job_title['ar']:'' !!}" required>
                                        <div class="invalid-feedback">Please provide a Arabic Job Title.</div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <label>Intro Text</label>
                                <div class="form-row mb-3">
                                    <div class="col-12 col-md-6">
                                        <textarea style="display: none;" type="hidden" name="intro_text[en]" id="intro_text_en"></textarea>
                                        <div style="min-height: 150px; max-height: 75%;" id="intro_text_en_div" class="form-control">{!! ($team->intro_text && isset($team->intro_text['en']))?$team->intro_text['en']:'' !!}</div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <textarea style="display: none;" type="hidden" name="intro_text[ar]" id="intro_text_ar"></textarea>
                                        <div style="min-height: 150px; max-height: 75%;" id="intro_text_ar_div" class="form-control">{!! ($team->intro_text && isset($team->intro_text['ar']))?$team->intro_text['ar']:'' !!}</div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <label>Full Text</label>
                                <div class="form-row mb-5">
                                    <div class="col-12 col-md-6">
                                        <button type="button" class="btn" onclick="$('#full_text_en_div').toggle(100); $('#full_text_en').toggle(100); fill_textarea()">Disable Editor</button>
                                        <textarea class="form-control" style="height:400px; display: none; word-break-wrap: pre;" type="hidden" name="full_text[en]" id="full_text_en">{!! ($team->full_text && isset($team->full_text['en']))?$team->full_text['en']:'' !!}</textarea>
                                        <div style="min-height: 150px; max-height: 75%;" id="full_text_en_div" class="form-control">
                                            {!! ($team->full_text && isset($team->full_text['en']))?$team->full_text['en']:'' !!}</div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <button type="button" class="btn" onclick="$('#full_text_ar_div').toggle(100); $('#full_text_ar').toggle(100)">Disable Editor</button>
                                        <textarea class="form-control" style="height:400px; display: none;" type="hidden" name="full_text[ar]" id="full_text_ar">{!! ($team->full_text && isset($team->full_text['ar']))?$team->full_text['ar']:'' !!}</textarea>
                                        <div style="min-height: 150px; max-height: 75%;" id="full_text_ar_div" class="form-control">{!! ($team->full_text && isset($team->full_text['ar']))?$team->full_text['ar']:'' !!}</div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <button class="btn btn-primary"
                                    type="submit">
                                @if($team->id)
                                    Update
                                @else
                                    Save
                                @endif
                            </button>
                            <a href="{{url('dashboard/teams')}}" class="btn btn-secondary">Cancel</a>

                        </div>
                        <div class="col-12 col-lg-3 mt-2 pt-5 card-form__body card-body">
                            <input id="img_upload" type="file" name="img_upload" style="display: none;">
                            <div id="img-upload" onclick="$('#img_upload').click()">
                                <label>Click to upload Profile Picture</label>
                            </div>
                            <div class="form-group">
                                <label>Ordering</label>
                                <input type="number" class="form-control" name="ordering" value="{{$team->ordering?$team->ordering:0}}">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input"
                                           type="checkbox"
                                           name="published"
                                           value="1"
                                           id="invalidCheck01"
                                           @if($team->published)
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
        let intro_text_ar="",intro_text_en="",full_text_en="",full_text_ar;


        $(document).ready(function (){
            intro_text_en = new Quill('#intro_text_en_div', {
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
            intro_text_ar = new Quill('#intro_text_ar_div', {
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
            full_text_en = new Quill('#full_text_en_div', {
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
                placeholder: 'English',
                theme: 'snow'  // or 'bubble'
            });
            full_text_ar = new Quill('#full_text_ar_div', {
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
        function fill_textarea()
        {
            if(!$('#full_text_en').val())
                $('#full_text_en').val(full_text_en.root.innerHTML);
            if(!$('#full_text_ar').val())
                $('#full_text_ar').val(full_text_ar.root.innerHTML);
        }

        $('#post-form').submit(function (e){
            e.preventDefault();

            $('#intro_text_en').val(intro_text_en.root.innerHTML);
            $('#intro_text_ar').val(intro_text_ar.root.innerHTML);
            if($('#full_text_en:hidden')[0])
                $('#full_text_en').val(full_text_en.root.innerHTML);
            if($('#full_text_ar:hidden')[0])
                $('#full_text_ar').val(full_text_ar.root.innerHTML);
            setTimeout(function (){
                $('#post-form')[0].submit();
            },500)


        });

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
        $('#icon_upload').on('change',function(){
            var temp = $('#icon-upload');
            readURL(this,temp);
        })


    </script>
@endsection
@section('scripts')
    <!-- List.js -->
    <script src="{{asset('dashboard-asset/assets/vendor/list.min.js')}}"></script>
    <script src="{{asset('dashboard-asset/assets/js/list.js')}}"></script>
@endsection
@section('side-menu')
    @include('dashboard.components.side-menu')
@endsection

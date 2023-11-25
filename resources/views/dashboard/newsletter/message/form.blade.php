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
                        @if($newsletter->id)
                            <li class="breadcrumb-item active"
                                aria-current="page">Edit Message</li>
                        @else
                            <li class="breadcrumb-item active"
                                aria-current="page">New Message</li>
                        @endif
                    </ol>
                </nav>
                @if($newsletter->id)
                    <h1 class="m-0">Edit Message</h1>
                @else
                    <h1 class="m-0">New Message</h1>
                @endif
            </div>
        </div>

        <div class="container-fluid page__container">
            <form action="{{url('dashboard/newsletters')}}" method="post" id="post-form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$newsletter->id}}">
                <div class="card card-form">
                    <div class="row">
                        <div class="col-lg-9 card-form__body card-body">

                            <div class="was-validated">
                                <label for="validationSample01">Subject</label>
                                <div class="form-row">
                                    <div class="col-12 col-md-12 mb-3">
                                        <input type="text"
                                               class="form-control"
                                               id="validationSample01"
                                               placeholder="Subject"
                                               name="subject"
                                               value="{{$newsletter->subject}}"
                                               required="">
                                        <div class="invalid-feedback">Please provide a subject.</div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    
                                </div>
                                <label for="validationSample01">From</label>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <input type="email"
                                               class="form-control"
                                               id="validationSample01"
                                               placeholder="Eamil"
                                               name="from_email"
                                               value="{{$newsletter->from_email?$newsletter->from_email:'hello@fshcpa.org'}}"
                                               required="">
                                        <div class="invalid-feedback">Please provide a email.</div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <input type="text"
                                               class="form-control"
                                               id="validationSample01"
                                               placeholder="From Name"
                                               name="from_name"
                                               value="{{$newsletter->from_name}}"
                                               required="">
                                        <div class="invalid-feedback">Please provide a email.</div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    
                                </div>
                                <label for="validationSample01">Reply</label>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <input type="email"
                                               class="form-control"
                                               id="validationSample01"
                                               placeholder="Eamil"
                                               name="reply_email"
                                               value="{{$newsletter->reply_email?$newsletter->reply_email:'info@fshcpa.com'}}"
                                               required="">
                                        <div class="invalid-feedback">Please provide a email.</div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <input type="text"
                                               class="form-control"
                                               id="validationSample01"
                                               placeholder="Reply Name"
                                               name="reply_name"
                                               value="{{$newsletter->reply_name}}"
                                               required="">
                                        <div class="invalid-feedback">Please provide a email.</div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    
                                </div>
                                
                                <label>Message</label>
                                <div class="col-12 col-md-12">
                                        
                                        <textarea class="form-control" style="display: none;" type="hidden" name="message" id="message">{!! $newsletter->message !!}</textarea>
                                        <div style="min-height: 450px; max-height: 75%;" id="message_div" class="form-control">{!! $newsletter->message !!}</div>
                                    </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="mt-4">

                            <button class="btn btn-primary"
                                    type="submit">
                                @if($newsletter->id)
                                    Update
                                @else
                                    Save
                                @endif
                            </button>
                            <a href="{{url('dashboard/newsletters')}}" class="btn btn-secondary">Cancel</a>
    </div>
                        </div>
                        <div  class="col-lg-3 card-form__body card-body">
                        <div class="custom-control custom-checkbox mt-4">
                            <input class="custom-control-input"
                                   type="checkbox"
                                   name="published"
                                   value="1"
                                   id="invalidCheck01"
                                   @if($newsletter->published)
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
    <script>
        message = new Quill('#message_div', {
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
                placeholder: 'Message',
                theme: 'snow'  // or 'bubble'
            })
            $('#post-form').submit(function (e){
            e.preventDefault();
            
            if(!$('#message').val())
            $('#message').val(message.root.innerHTML);
            
            
            setTimeout(function (){
                $('#post-form')[0].submit();
            },500)
        });
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

@extends('dashboard.layouts.master')
@section('header')
    <!-- Quill Theme -->
    <link type="text/css" href="{{ asset('dashboard-asset/assets/css/vendor-quill.css') }}" rel="stylesheet">
    <style>
        .ql-omega:after {
            content: "+";
        }

        .full_screen {
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100vw;
            max-width: 82vw;
            height: 100vh;
            z-index: 999;
            transition: 0.5s all;
        }

        #icon-upload,
        #img-upload {
            padding: 65px 0px;
            min-width: 100px;
            width: 150px;
            height: 150px;
            border: 1px solid #ccc;
            border-radius: 50%;
            text-align: center;
            background-color: #eee;
            margin-bottom: 20px;
            background-size: cover !important;
            background-repeat: no-repeat !important;
            background-position-x: 50% !important;

        }

        #icon-upload label,
        #img-upload label {
            font-size: 12px;
            cursor: pointer;
        }
        .message  img
        {
            max-width: 100%;
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

                        <li class="breadcrumb-item"><a href="{{ url('dashboard/teams') }}">Newsletter</a></li>
                        @if ($newsletter->id)
                            <li class="breadcrumb-item active" aria-current="page">Edit Message</li>
                        @else
                            <li class="breadcrumb-item active" aria-current="page">New Message</li>
                        @endif
                    </ol>
                </nav>
                @if ($newsletter->id)
                    <h1 class="m-0">Edit Message</h1>
                @else
                    <h1 class="m-0">New Message</h1>
                @endif
            </div>
        </div>

        <div class="container-fluid page__container">



            <div class="card card-form">
                <div class="row">
                    <div class="col-lg-9 card-form__body card-body">
                        <h3 class="border-bottom mb-4">
                            <b>Subject:</b> {{ $newsletter->subject }}
                        </h3>

                        <div class="row border-bottom p-2">
                            <div class=" md-col-6 pl-4 px-2">
                                <b>From:</b> {{ $newsletter->from_name }} < {{ $newsletter->from_email }}>
                            </div>
                            <div class="md-col-6 px-2">
                                <b>reply To:</b> {{ $newsletter->reply_name }} < {{ $newsletter->reply_email }}>
                            </div>
                        </div>
                        <div class="message card-body overflow-hidden">
                            {!! $newsletter->message !!}
                        </div>


                    </div>
                    <div class="col-lg-3 card-form__body card-body">
                        <form action="{{url('/dashboard/newsletters/send')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $newsletter->id }}">
                            <div class="row">
                                <div class="col-md-4">Send To:</div>
                                <div class="col-md-8">
                                    @foreach ($lists as $list)
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="lists[]" value="{{ $list->id }}" />
                                                {{ $list->name }} ({{ $list->subscribers->count() }})

                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    Last Time Sent:
                                </div>
                                <div class="col-md-6">
                                    @if($newsletter->last_sent)
                                    {{date($newsletter->last_sent)}}
                                    @else
                                    Never
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-12">
                                    <button class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>

            </div>

        </div>

    </div>
@endsection
@section('scripts')
    <!-- Quill -->
    <script src="{{ asset('dashboard-asset/assets/vendor/quill.min.js') }}"></script>
    <script src="{{ asset('dashboard-asset/assets/js/quill.js') }}"></script>
    <script>
        message = new Quill('#message_div', {
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, 3, 4, 5, 6, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike', {
                        'color': ['#336699', '#339933', '#333333', '#000000', '#ffffff']
                    }, {
                        'background': ['#336699', '#339933', '#333333', '#000000', '#ffffff']
                    }],
                    ['image', 'code-block'],
                    ['link'],
                    [{
                        'script': 'sub'
                    }, {
                        'script': 'super'
                    }],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    ['clean'],
                    ['omega']
                ]
            },
            placeholder: 'Message',
            theme: 'snow' // or 'bubble'
        })
        $('#post-form').submit(function(e) {
            e.preventDefault();

            if (!$('#message').val())
                $('#message').val(message.root.innerHTML);


            setTimeout(function() {
                $('#post-form')[0].submit();
            }, 500)
        });
    </script>
@endsection
@section('scripts')
    <!-- List.js -->
    <script src="{{ asset('dashboard-asset/assets/vendor/list.min.js') }}"></script>
    <script src="{{ asset('dashboard-asset/assets/js/list.js') }}"></script>
@endsection
@section('side-menu')
    @include('dashboard.components.side-menu')
@endsection

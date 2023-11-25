@extends('dashboard.layouts.master')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"
                            aria-current="page">Newsletter</li>
                    </ol>
                </nav>
                <h1 class="m-0">Newsletter List</h1>
            </div>
            <div class="float-end"><a href="{{url('dashboard/newsletters/create')}}" class="btn btn-primary">New Newsletter</a></div>

        </div>
    </div>
    <div class="container-fluid page__container">
        <div class="table-responsive border-bottom"
             data-toggle="lists"
             data-lists-values='["service-name"]'>

            

            <table class="table mb-0 thead-border-top-0">
                <thead>
                <tr>

                    <th>Subject</th>
                    <th>Sent/Pendding</th>
                    <th>Receiver/Views</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th style="width: 24px;"></th>
                </tr>
                </thead>
                <tbody class="list"
                       id="staff02">
                @foreach($newsletters as $newsletter)
                    <tr>

                        <td>

                            <span class="service-name"><a href="{{url('dashboard/newsletters/'.$newsletter->id)}}">{{$newsletter->subject }}</a></span>

                        </td>
                        <td>
                            {{$newsletter->sentEmails->count()}}/{{$newsletter->penddingEmails->count()}}
                        </td>
                        <td>
                            {{$newsletter->views->count()}}/{{$newsletter->views->sum('count')}}
                        </td>
                        <td>
                            @if($newsletter->published)
                                <span class="badge badge-success">Published</span>
                            @else
                                <span class="badge badge-danger">Not Published</span>
                            @endif
                        </td>
                        <td>{{$newsletter->created_at->format('d/m/Y') }}</td>
                        <td style="width: 24px;">

                            <div class="dropdown">
                                <button  id="dropdown-{{$newsletter->id}}"
                                         class=" btn btn-link text-muted dropdown-toggle" data-toggle="dropdown" data-caret="false" aria-expanded="true"><i class="material-icons">more_vert</i></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-{{$newsletter->id}}">
                                <li>
                                        
                                            <a href="{{url('dashboard/newsletters/'.$newsletter->id.'/edit')}}" class="btn btn-block text-info"><i class="fa fa-trash-alt"></i> Edit</a>
                                        
                                    </li>    
                                <li>
                                        <form action="{{url('dashboard/newsletters/'.$newsletter->id)}}" method="post">
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

@endsection
@section('scripts')
    <!-- List.js -->
    <script src="{{asset('dashboard-asset/assets/vendor/list.min.js')}}"></script>
    <script src="{{asset('dashboard-asset/assets/js/list.js')}}"></script>
@endsection
@section('side-menu')
    @include('dashboard.components.side-menu')
@endsection

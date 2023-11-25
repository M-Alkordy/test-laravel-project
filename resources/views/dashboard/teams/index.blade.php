@extends('dashboard.layouts.master')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"
                            aria-current="page">Team</li>
                    </ol>
                </nav>
                <h1 class="m-0">Team</h1>
            </div>
            <div class="float-end"><a href="{{url('dashboard/teams/create')}}" class="btn btn-primary">New Team Member</a></div>

        </div>
    </div>
    <div class="container-fluid page__container">
        <div class="table-responsive border-bottom"
             data-toggle="lists"
             data-lists-values='["service-name"]'>

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

                    <th>Member</th>
                    <th>Job Title</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th style="width: 24px;"></th>
                </tr>
                </thead>
                <tbody class="list"
                       id="staff02">
                @foreach($teams as $team)
                    <tr>

                        <td>

                            <span class="service-name"><a href="{{url('dashboard/teams/'.$team->id.'/edit')}}">{{($team->name && isset(json_decode($team->name,true)['en']))?json_decode($team->name,true)['en']:''}}</a></span>

                        </td>
                        <td>
                            {{($team->job_title && isset(json_decode($team->job_title,true)['en']))?json_decode($team->job_title,true)['en']:''}}
                        </td>
                        <td>
                            @if($team->published)
                                <span class="badge badge-success">Published</span>
                            @else
                                <span class="badge badge-danger">Not Published</span>
                            @endif
                        </td>
                        <td>{{$team->created_at->format('d/m/Y') }}</td>
                        <td style="width: 24px;">

                            <div class="dropdown">
                                <button  id="dropdown-{{$team->id}}"
                                         class=" btn btn-link text-muted dropdown-toggle" data-toggle="dropdown" data-caret="false" aria-expanded="true"><i class="material-icons">more_vert</i></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-{{$team->id}}">
                                    <li>
                                        <form action="{{url('dashboard/teams/'.$team->id)}}" method="post">
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

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
                <h1 class="m-0">Subscribers Lists</h1>
            </div>
            <div class="float-end"><a href="{{url('dashboard/subscribers-list/create')}}" class="btn btn-primary">New List</a></div>

        </div>
    </div>
    <div class="container-fluid page__container">
        <div class="table-responsive border-bottom"
             data-toggle="lists"
             data-lists-values='["service-name"]'>

            

            <table class="table mb-0 thead-border-top-0">
                <thead>
                <tr>

                    <th>List Name</th>
                    <th>List Description</th>
                    <th>Subscribers Count</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th style="width: 24px;"></th>
                </tr>
                </thead>
                <tbody class="list"
                       id="staff02">
                @foreach($lists as $list)
                    <tr>

                        <td>

                            <span class="service-name"><a href="{{url('dashboard/subscribers-list/'.$list->id)}}">{{$list->name }}</a></span>

                        </td>
                        <td>
                            {{$list->description}}
                        </td>
                        <td>
                            {{$list->subscribers()->where('subscribed',1)->count()}}
                        </td>
                        <td>
                            @if($list->published)
                                <span class="badge badge-success">Published</span>
                            @else
                                <span class="badge badge-danger">Not Published</span>
                            @endif
                        </td>
                        <td>{{$list->created_at->format('d/m/Y') }}</td>
                        <td style="width: 24px;">

                            <div class="dropdown">
                                <button  id="dropdown-{{$list->id}}"
                                         class=" btn btn-link text-muted dropdown-toggle" data-toggle="dropdown" data-caret="false" aria-expanded="true"><i class="material-icons">more_vert</i></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-{{$list->id}}">
                                <li>
                                        
                                            <a href="{{url('dashboard/subscribers-list/'.$list->id.'/edit')}}" class="btn btn-block text-info"><i class="fa fa-trash-alt"></i> Edit</a>
                                        
                                    </li>    
                                <li>
                                        <form action="{{url('dashboard/subscribers-list/'.$list->id)}}" method="post">
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

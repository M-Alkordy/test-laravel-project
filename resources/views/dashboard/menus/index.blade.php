@extends('dashboard.layouts.master')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"
                            aria-current="page">Menu</li>
                    </ol>
                </nav>
                <h1 class="m-0">Menu</h1>
            </div>
            <div class="float-end"><a href="{{url('dashboard/menu/menu-type')}}" class="btn btn-primary">New Menu Item</a></div>

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

                    <th>Menu</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Ordering</th>
                    <th>Created At</th>
                    <th style="width: 24px;"></th>
                </tr>
                </thead>
                <tbody class="list"
                       id="staff02">
                @foreach($menus as $menu)
                    <tr>

                        <td>
                            <span class="service-name"><a href="{{url('dashboard/menus/'.$menu->id.'/edit')}}">{{($menu->name && isset(json_decode($menu->name,true)['en']))?json_decode($menu->name,true)['en']:''}}</a></span>
                        </td>

                        <td>
                            @if($menu->published)
                                <span class="badge badge-success">Published</span>
                            @else
                                <span class="badge badge-danger">Not Published</span>
                            @endif
                        </td>
                        <td>
                            {{$menu->component_type}}
                        </td>
                        <td>
                            {{$menu->ordering}}
                        </td>
                        <td>{{$menu->created_at?$menu->created_at->format('d/m/Y'):'' }}</td>
                        <td style="width: 24px;">

                            <div class="dropdown">
                                <button  id="dropdown-{{$menu->id}}"
                                         class=" btn btn-link text-muted dropdown-toggle" data-toggle="dropdown" data-caret="false" aria-expanded="true"><i class="material-icons">more_vert</i></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-{{$menu->id}}">
                                    <li>
                                        <form action="{{url('dashboard/menus/'.$menu->id)}}" method="post">
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

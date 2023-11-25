@extends('dashboard.layouts.master')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"
                            aria-current="page">Sections</li>
                    </ol>
                </nav>
                <h1 class="m-0">Sections</h1>
            </div>
            <div class="float-end"><a href="{{url('dashboard/section-type')}}" class="btn btn-primary">New Section</a></div>

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

                    <th>Section</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>Ordering</th>
                    <th>Created At</th>
                    <th style="width: 24px;"></th>
                </tr>
                </thead>
                <tbody class="list"
                       id="staff02">
                @foreach($output_sections as $section)
                    <tr>

                        <td>
                            <span class="service-name"><a href="{{url('dashboard/sections/'.$section->id.'/edit')}}">{{($section->title && isset(json_decode($section->title,true)['en']))?json_decode($section->title,true)['en']:''}}</a></span>
                        </td>

                        <td>
                            @if($section->published)
                                <span class="badge badge-success">Published</span>
                            @else
                                <span class="badge badge-danger">Not Published</span>
                            @endif
                        </td>
                        <td>
                            {{$section->component_type}}
                        </td>
                        <td>
                            {{$section->ordering}}
                        </td>
                        <td>{{$section->created_at?$section->created_at->format('d/m/Y'):'' }}</td>
                        <td style="width: 24px;">

                            <div class="dropdown">
                                <button  id="dropdown-{{$section->id}}"
                                         class=" btn btn-link text-muted dropdown-toggle" data-toggle="dropdown" data-caret="false" aria-expanded="true"><i class="material-icons">more_vert</i></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-{{$section->id}}">
                                    <li>
                                        <form action="{{url('dashboard/sections/'.$section->id)}}" method="post">
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

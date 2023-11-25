@extends('site.layouts.master')
@section('content')
@foreach($output_sections as $section)

    {!! $section->html !!}
@endforeach
@endsection

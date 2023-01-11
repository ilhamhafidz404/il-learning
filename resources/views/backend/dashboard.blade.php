@extends('backend.layouts.master')

@section('content')
    @if (Session::has('lecturer') and Session::get('lecturer'))
        @include('backend.lecturer.dashboard')
    @else
        @include('backend.student.dashboard')
    @endif
@endsection
@extends('backend.layouts.master')

@section('content')
    @if (Session::has('lecturer') and Session::get('lecturer'))
        @include('backend.lecturer.course.show')
    @else
        @include('backend.student.course.show')
    @endif
@endsection
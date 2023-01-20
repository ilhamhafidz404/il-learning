@extends('backend.layouts.master')

@section('content')
    @if (Auth::user()->hasRole('lecturer'))
        @include('backend.lecturer.dashboard')
    @else
        @include('backend.student.dashboard')
    @endif
@endsection
@extends('common.master')

@section('body')
    @include('common.navbar')

    @yield('content')

    @include('common.footer')
@endsection

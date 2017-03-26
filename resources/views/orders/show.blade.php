@extends('layouts.master')


@section('title')
    Orders Page
@endsection


@push('head')
    <link href="/css/books/show.css" type='text/css' rel='stylesheet'>
@endpush


@section('content')
    @if($title)
        <h1>Orders: {{ $title }}</h1>
    @else
        <h1>No orders chosen</h1>
    @endif
@endsection


@push('body')
    <script src="/js/books/show.js"></script>
@endpush

@extends('home.partials.main')

@section('container')
    <h1>{{ auth()->user()->name }}</h1>
@endsection
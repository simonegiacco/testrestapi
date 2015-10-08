@extends('layouts.default')

@section('content')
    <h3 class="text-center">Profile</h3>
    <h1 class="text-center">Hello, {{ auth()->user()->name }}</h1>
@stop
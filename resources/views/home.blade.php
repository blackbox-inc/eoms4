{{-- 
@extends('app')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop --}}



@extends('layouts.admin')



@section('content')

  @include('inc.box')

  
    {{-- <h1>Welcome to the Home Page</h1>
    <p>This is the default home page of your Laravel application.</p>
    
    @if (Auth::check())
        <p>Welcome, {{ Auth::user()->name }}!</p>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <p>You are not logged in.</p>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endif --}}


@endsection
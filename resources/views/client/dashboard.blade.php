@extends('layouts.layout')
@section('navbar')
<nav>
    <a href="{{url('/')}}">Home</a>
    <form action="{{ url('/auth/logout') }}" method="POST">
        @csrf
        <button type="submit">Sair</button>
    </form>
</nav>
@endsection
@section('main')
    <h1>Client dashboard</h1>
@endsection

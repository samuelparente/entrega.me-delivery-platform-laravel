@extends('layouts.layout')
@section('navbar')
<nav>
    @auth
        <a href="{{url('/')}}">Home</a>
        @if (Auth::user()->role === 'client')
            <a href="{{ route('client.dashboard') }}"><i class="bi bi-speedometer"></i> A minha área</a>
        @elseif (Auth::user()->role === 'company')
            <a href="{{ route('company.dashboard') }}"><i class="bi bi-speedometer"></i> A minha área</a>
        @elseif (Auth::user()->role === 'messenger')
            <a href="{{ route('messenger.dashboard') }}"><i class="bi bi-speedometer"></i> A minha área</a>
        @endif
        <form action="{{ url('/auth/logout') }}" method="POST">
            @csrf
            <button type="submit"> <i class="bi bi-box-arrow-right"></i> Terminar sessão</button>
        </form>
    @else
        @include('partials.mainnavbar')
    @endauth
</nav>
@endsection
@section('main')
    <h1>Página registar</h1>
        {{$errors}}
        <form action="{{url('/auth/registeruser')}}" method="Post">

            @csrf

            <label for="name">Nome:</label>
            <input type="text" id="name" name="name">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email">
            <label for="password">Palavra-passe:</label>
            <input type="password" id="password" name="password">
            <label for="role">Quero registar-me como:</label>
            <select id="role" name="role">
                <option value="">Selecione...</option>
                <option value="client">Cliente</option>
                <option value="messenger">Estafeta</option>
                <option value="company">Empresa</option>
            </select>
            <input class="btn btn-primary" type="submit" value="Registar">
        </form>
@endsection

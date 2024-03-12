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
    <h1>Página login</h1>
        {{$errors}}
        <form method="POST" action="">
            @csrf

            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="" required autofocus>
            </div>

            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div>
                <button type="submit">Login</button>
            </div>
        </form>
@endsection

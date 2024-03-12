@extends('layouts.layout')
@section('navbar')
    @include('company.companynavbar')
@endsection
@section('main')
    
    <div class="profile">
        <h3>O meu Perfil</h3>
        <hr>
        <form action="{{url('/editprofile')}}" method="Post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
            <div class="avatar-profile">
                @if (Auth::user()->image)
                <img src="{{ asset('images/profiles/'.Auth::user()->image) }}" alt="Avatar">
                @else
                <img src="{{ asset('images/profiles/default.png') }}" alt="Avatar">
                @endif
            </div>
            <div> 
                <label>Alterar imagem do perfil</label>
                <input type="file" name="image">
            </div>
            <div>
                <label><b>Nome:</b></label>
                <input type="text" name="name" value="{{Auth::user()->name}}">
            </div>
            <div>
                <label><b>Endereço:</b></label>
                <input type="text" name="address1" value="{{Auth::user()->address1}}">
            </div>
            <div>
                <label><b>Endereço (cont.):</b></label>
                <input type="text" name="address2" value="{{Auth::user()->address2}}">
            </div>
            <div>
                <label><b>Localidade:</b></label>
                <input type="text" name="city" value="{{Auth::user()->city}}">
            </div>
            <div>
                <label><b>Código postal:</b></label>
                <input type="text" name="cp" value="{{Auth::user()->cp}}">
            </div>
            <div>
                <label><b>País:</b></label>
                <input type="text" name="country" value="{{Auth::user()->country}}">
            </div>
            <div>
                <label><b>Contacto 1:</b></label>
                <input type="text" name="phone1" value="{{Auth::user()->phone1}}">
            </div>
            <div>
                <label><b>Contacto 2:</b></label>
                <input type="text" name="phone2" value="{{Auth::user()->phone2}}">
            </div>
            <div>
                <label><b>Email:</b></label>
                <input type="text" name="email" value="{{Auth::user()->email}}">
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="Gravar alterações">
            </div>
        </form>
    </div>
@endsection

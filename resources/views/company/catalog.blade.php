@extends('layouts.layout')
@section('navbar')
    @include('company.companynavbar')
@endsection
@section('main')
    <h1>Company products catalog</h1>
    <div>
    <a href="{{url('/company/createproduct')}}" class="btn btn-primary">Criar novo produto</a>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-lg-3 mb-3">
                <div class="card">
                    <a href="{{url('/company/showproduct',$product->id)}}"><img class ="product-card-image card-img-top" src="{{ asset('images/products/' . $product->image) }}"  alt="{{ $product->name }}"></img></a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Price:{{ $product->price }}€</p>
                        @if ($product->active)
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-danger">Inactive</span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

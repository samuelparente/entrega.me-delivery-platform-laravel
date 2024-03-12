@extends('layouts.layout')
@section('navbar')
    @include('company.companynavbar')
@endsection
@section('main')
    <div class="container">
        <h1>Detalhes do Produto</h1>
        <div class="row">
            <div>
                @if ($product->active)
                <span class="badge bg-success">Active</span>
                @else
                <span class="badge bg-danger">Inactive</span>
                @endif
                <a href="{{url('/company/updateproduct',$product->id)}}" class="btn btn-primary">Editar</a>
                <a href="{{url('/company/deleteproduct',$product->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');">Eliminar</a>
            </div>
            <div class="col-lg-6">
                <div > 
                    <img class="product-image-avatar" src="{{ asset('images/products/'.$product->image) }}" alt="product-image">
                </div>
                <div>
                    <h4>Nome:</h4>
                    <p>{{ $product->name }}</p>
                </div>
                <div>
                    <h4>Descrição:</h4>
                    <p>{{ $product->description }}</p>
                </div>
                <div>
                    <h4>Categoria:</h4>
                    <p>{{ $product->category }}</p>
                </div>
                <div>
                    <h4>Tipo:</h4>
                    <p>{{ $product->type }}</p>
                </div>
                <div>
                    <h4>Marca:</h4>
                    <p>{{ $product->brand }}</p>
                </div>
                <div>
                    <h4>Número do Modelo:</h4>
                    <p>{{ $product->model_number }}</p>
                </div>
                <div>
                    <h4>UPC:</h4>
                    <p>{{ $product->upc }}</p>
                </div>
                <div>
                    <h4>SKU:</h4>
                    <p>{{ $product->sku }}</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <h4>Stock:</h4>
                    <p>{{ $product->stock }}</p>
                </div>
                <div>
                    <h4>Preço:</h4>
                    <p>{{ $product->price }}</p>
                </div>
                <div>
                    <h4>Imposto:</h4>
                    <p>{{ $product->tax }}</p>
                </div>
                <div>
                    <h4>Envio:</h4>
                    <p>{{ $product->shipping }}</p>
                </div>
                <div>
                    <h4>Peso:</h4>
                    <p>{{ $product->weight }}</p>
                </div>
                <div>
                    <h4>Cor:</h4>
                    <p>{{ $product->color }}</p>
                </div>
                <div>
                    <h4>Dimensões:</h4>
                    <p>{{ $product->dimensions }}</p>
                </div>
                <div>
                    <h4>Material:</h4>
                    <p>{{ $product->material }}</p>
                </div>
                <div>
                    <h4>Garantia:</h4>
                    <p>{{ $product->warranty }}</p>
                </div>
                <div>
                    <h4>Características:</h4>
                    <p>{{ $product->features }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

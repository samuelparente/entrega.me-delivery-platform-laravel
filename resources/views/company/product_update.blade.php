@extends('layouts.layout')
@section('navbar')
    @include('company.companynavbar')
@endsection
@section('main')
<div>
    <form action="{{url('/company/edit_product',$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
         <div>
            <label for="active">Ativo:</label>
            <input type="checkbox" id="active" name="active" value="1" @if($product->active) checked @endif>
        </div>
        <div > 
            <img class="product-image-avatar" src="{{ asset('images/products/'.$product->image) }}" alt="product-image">
        </div>
        <div> 
            <label>Alterar imagem</label>
            <input type="file" name="image">
        </div>
        <div>
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="{{$product->name}}">
        </div>
        <div>
            <label for="description">Descrição:</label>
            <textarea id="description" name="description">{{$product->description}}</textarea>
        </div>
        <div>
            <label for="category">Categoria:</label>
            <input type="text" id="category" name="category" value="{{$product->category}}">
        </div>
        <div>
            <label for="type">Tipo:</label>
            <input type="text" id="type" name="type" value="{{$product->type}}">
        </div>
        <div>
            <label for="brand">Marca:</label>
            <input type="text" id="brand" name="brand" value="{{$product->brand}}">
        </div>
        <div>
            <label for="model_number">Número do Modelo:</label>
            <input type="text" id="model_number" name="model_number" value="{{$product->model_number}}">
        </div>
        <div>
            <label for="upc">UPC:</label>
            <input type="text" id="upc" name="upc" value="{{$product->upc}}">
        </div>
        <div>
            <label for="sku">SKU:</label>
            <input type="text" id="sku" name="sku" value="{{$product->sku}}">
        </div>
        <div>
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" value="{{$product->stock}}">
        </div>
        <div>
            <label for="price">Preço:</label>
            <input type="text" id="price" name="price" value="{{$product->price}}">
        </div>
        <div>
            <label for="tax">Imposto:</label>
            <input type="text" id="tax" name="tax" value="{{$product->tax}}">
        </div>
        <div>
            <label for="shipping">Envio:</label>
            <input type="text" id="shipping" name="shipping" value="{{$product->shipping}}">
        </div>
        <div>
            <label for="weight">Peso:</label>
            <input type="text" id="weight" name="weight" value="{{$product->weight}}">
        </div>
        <div>
            <label for="color">Cor:</label>
            <input type="text" id="color" name="color" value="{{$product->color}}">
        </div>
        <div>
            <label for="dimensions">Dimensões:</label>
            <input type="text" id="dimensions" name="dimensions" value="{{$product->dimensions}}">
        </div>
        <div>
            <label for="material">Material:</label>
            <input type="text" id="material" name="material" value="{{$product->material}}">
        </div>
        <div>
            <label for="warranty">Garantia:</label>
            <textarea id="warranty" name="warranty" >{{$product->warranty}}</textarea>
        </div>
        <div>
            <label for="features">Características:</label>
            <textarea id="features" name="features">{{$product->features}}</textarea>
        </div>
        <button type="submit">Gravar alterações</button>
    </form>
</div>
@endsection

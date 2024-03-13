@extends('layouts.layout')
@section('navbar')
    @include('company.companynavbar')
@endsection
@section('main')
    <h1>Detalhes da Encomenda</h1>
    <h2>Detalhes do Cliente</h2>
    <div class="row">
        <div class="col-md-6">
            <strong>Nome:</strong> {{ $order->client->name }} <br>
            <strong>Telefone:</strong> {{ $order->client->phone1 }} <br>
            <strong>NIF:</strong> {{ $order->client->nif }} <br>
            <strong>Morada:</strong> {{ $order->client->address1 }} <br>
        </div>
    </div>
    <hr>
    <h2>Produtos</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalProducts = 0;
                    $totalTaxes = 0;
                    $totalShipping = 0;
                @endphp
                @foreach ($order->products as $product)
                    <tr>
                        <td>
                            <img src="{{ asset('images/products/'.$product->image) }}" alt="{{ $product->name }}" style="max-width: 100px;">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ $product->price }}€</td>
                        <td>{{ $product->description }}</td>
                    </tr>
                    @php
                        $totalProducts += ($product->price * $product->pivot->quantity);
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    <h3>Total dos Produtos: {{ $totalProducts }}€</h3>
    <h3>Total das Taxas: {{ $totalTaxes }}€</h3>
    <h3>Total de Entrega: {{ $totalShipping }}€</h3>
    <hr>
    <h3>Total da Encomenda: {{ $totalProducts + $totalTaxes + $totalShipping }}€</h3>
@endsection

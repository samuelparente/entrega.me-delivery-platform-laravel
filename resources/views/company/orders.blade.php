@extends('layouts.layout')
@section('navbar')
    @include('company.companynavbar')
@endsection
@section('main')
    <h1>Encomendas</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Estafeta</th>
                    <th>Estado de Entrega</th>
                    <th>Estado de Pagamento</th>
                    <th>Comentários</th>
                    <th>Total</th> <!-- Nova coluna para o valor total -->
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr style="cursor:pointer;" onclick="window.location.href='{{ url('orderdetails', ['id' => $order->id]) }}';">
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->client->name }}</td>
                        <td>{{ $order->messenger->name }}</td>
                        <td>
                            @if ($order->delivery_status === 'Entregue')
                                <span class="badge bg-success">{{ $order->delivery_status }}</span>
                            @else
                                <span class="badge bg-warning">{{ $order->delivery_status }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($order->payment_status === 'Pago')
                                <span class="badge bg-success">{{ $order->payment_status }}</span>
                            @else
                                <span class="badge bg-warning">{{ $order->payment_status }}</span>
                            @endif
                        </td>
                        <td>{{ $order->comments }}</td>
                        <td>
                            {{-- Cálculo do valor total --}}
                            @php
                                $total = $order->products->sum(function ($product) {
                                    return $product->price * $product->pivot->quantity;
                                });

                                // Adicione taxas e custos de entrega se aplicável
                                // Exemplo: $total += $order->taxes;
                                // Exemplo: $total += $order->shipping_cost;
                            @endphp
                            € {{ $total }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

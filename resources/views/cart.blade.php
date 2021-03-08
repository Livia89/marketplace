@extends('layouts.front')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Carrinho de compras</h2>
        </div>
        <div class="col-12">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Subtotal</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $subtotal = 0;
                    @endphp
                    @foreach ($cart as $c)
                        <tr>
                            <td>{{$c['name']}}</td>
                            <td>{{number_format($c['price'], '2', ',', '.')}}€</td>
                            <td>{{$c['amount']}}</td>
                            @php
                                $subtotal += $c['price'] * $c['amount'];
                            @endphp
                            <td>{{number_format(($c['price'] * $c['amount']), '2', ',', '.')}}€</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-danger">Remover</a>
                            </td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="3">Total:</td>
                        <td colspan="2">{{number_format($subtotal, '2', ',', '.')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
@extends('layouts.app')

@section('content')
    <div class="right">
        <a href="{{route('admin.products.create')}}" class="btn btn-success btn-lg">Criar produto</a>
    </div>

    <table class="table table-stripped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Loja</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>

                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{number_format($product->price, 2, ',', '.')}}€ </td>
                <td>{{$product->store->name}}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('admin.products.edit', ['product' => $product->id])}}" class="btn btn-primary btn-sm">Editar</a> &nbsp;
                        
                        <form method='post' action="{{route('admin.products.destroy', ['product' => $product->id])}}">
                            @csrf
                            @method('DELETE')
                             <button class="btn btn-danger btn-sm">Remover</button>
                        </form>
                    </div>
                    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$products->links()}}
@endsection

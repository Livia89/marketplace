@extends('layouts.app')

@section('content')
    @if (!$store)
        <a href="{{route('admin.stores.create')}}" class="btn btn-success btn-lg">Criar loja</a>
    
    @else

    <div class="row">
        <div class="col-md-12 col">
            <table class="table table-striped">
                <thead class="text-white bg-danger">
                    <tr>
                        <th>#</th>
                        <th>Loja</th>
                        <th>Quantidade de produtos</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$store->id}}</td>
                        <td>{{$store->name}}</td>
                        <td>{{$store->products->count()}}</td>
                        <td width="15%">
                            <div class="btn-group">
                                
                                    <div class="row">
                                        <div class="col-md-4 col">
                                            <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-primary btn-sm">Editar</a>
                                        </div>
                                        
                                    <div class="col-md-4 col">
                                        <form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Remover</button>
                                        </form>
                                    </div>
                            </div>
                        </div>
                        </td>
                    </tr>
                </tbody>
            </table>
</div>
@endif
@endsection

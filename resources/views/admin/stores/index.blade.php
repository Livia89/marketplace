@extends('layouts.app')

@section('content')
    <a href="{{route('admin.stores.create')}}" class="btn btn-success btn-lg">Criar loja</a>

    <table class="table table-stripped">
    <thead>
        <tr>
            <th>#</th>
            <th>Loja</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stores as $store)
            <tr>

                <td>{{$store->id}}</td>
                <td>{{$store->name}}</td>
                <td>
                    <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-primary btn-sm">Editar</a>
                    <a href="{{route('admin.stores.destroy', ['store' => $store->id])}}" class="btn btn-danger btn-sm">Remover</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$stores->links()}}
@endsection

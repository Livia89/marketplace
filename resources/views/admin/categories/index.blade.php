@extends('layouts.app')


@section('content')

    <div class="row mb-2">
        <div class="col-md-3 col">
            <a href="{{route('admin.categories.create')}}" class="btn btn-lg btn-success">Criar Categoria</a>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-12 col">
            <table class="table table-striped">
                <thead class="text-white bg-danger">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td width="15%">
                                <div class="btn-group">
                                    <div class="row">
                                        <div class="col-md-5 col">
                                            <a href="{{route('admin.categories.edit', ['category' => $category->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
                                    
                                        </div>
                                        <div class="col col-md-5">
                                            <form action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
@endsection
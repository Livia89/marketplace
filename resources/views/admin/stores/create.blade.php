@extends('layouts.app')

@section('content')
    <h1>Adicionar uma loja</h1>
    <form action="{{Route('admin.stores.store')}}" method="post">
        <input type="hidden" name='_token' value="{{csrf_token()}}">
        <div class="form-group">
            <label for="">Nome da Loja</label>
            <input class="form-control" type="text" name="name">
        </div>
        <div class="form-group">
            <label for="">Descrição</label>
            <input class="form-control" type="text" name="description">
        </div>
        <div class="form-group">
            <label for="">Telefone</label>
            <input class="form-control" type="text" name="mobile_phone">
        </div>
        <div class="form-group">
            <label for="">Celular</label>
            <input class="form-control" type="text" name="phone">
        </div>
        <div class="form-group">
            <label for="">Slug</label>
            <input class="form-control" type="text" name="slug">
        </div>
        <div class="form-group">
            <label for="">Usuário</label>
            <select class="form-control" name="user">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-success" type="submit">Criar loja</button>
        </div>


    </form>

@endsection

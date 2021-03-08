@extends('layouts.app')

@section('content')
    <h1>Adicionar uma loja</h1>

    <form enctype="multipart/form-data" action="{{Route('admin.stores.update', ['store' => $store->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="">Nome da Loja</label>
            <input class="form-control" type="text" name="name" value="{{$store->name}}">
        </div>
        <div class="mb-3">
            <label for="">Descrição</label>
            <input class="form-control" type="text" name="description" value="{{$store->description}}">
        </div>
        <div class="mb-3">
            <label for="">Telefone</label>
            <input class="form-control" type="text" name="mobile_phone" value="{{$store->mobile_phone}}">
        </div>
        <div class="mb-3">
            <label for="">Telemóvel / Whatsapp</label>
            <input class="form-control" type="text" name="phone" value="{{$store->phone}}">
        </div>

        

        <div class="mb-3">
            <p>
                <img width='100' src="{{ asset('storage/'. $store->logo) }}" alt="">
            </p>

            <label>Logo da Loja</label>
            <input type="file" name='logo' value="{{$store->logo}}" class="form-control @error('logo') is-invalid @enderror ">
               @error('logo')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror

        </div>


        <div class="mb-3">
            <button class="btn btn-lg btn-success" type="submit">Atualizar loja</button>
        </div>


    </form>

@endsection

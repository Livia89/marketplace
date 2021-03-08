@extends('layouts.app')

@section('content')
    <h1>Adicionar uma loja</h1>
    <form enctype="multipart/form-data" action="{{Route('admin.stores.store')}}" method="post">
        <input type="hidden" name='_token' value="{{csrf_token()}}">


        <div class="mb-3">
            <label for="">Nome da Loja</label>
            <input class="@error('name') is-invalid @enderror form-control" type="text" name="name" value='{{old('name')}}'>
    
            @error('name')
                <div class="invalid-feedback">
                   {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Descrição</label>
            <input class="@error('description') is-invalid @enderror form-control" type="text" name="description" value='{{old('description')}}'>
          
            @error('description')
                <div class="invalid-feedback">
                   {{$message}}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="">Telefone</label>
            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value='{{old('phone')}}'>

            @error('phone')
                <div class="invalid-feedback">
                {{$message}}
                </div>
             @enderror

        </div>

        <div class="mb-3">
            <label for="">Telemóvel / Whatsapp</label>
            <input class="@error('mobile_phone') is-invalid @enderror form-control" type="text" name="mobile_phone" value='{{old('mobile_phone')}}'>

            @error('mobile_phone')
                <div class="invalid-feedback">
                {{$message}}
                </div>
            @enderror

        </div>


        <div class="mb-3">
            <label for="">Logo da Loja</label>
            <input type="file" name='logo' class="form-control @error('logo') is-invalid @enderror ">
               @error('logo')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror


        </div>

        <div class="mb-3">
            <button class="btn btn-lg btn-success" type="submit">Criar loja</button>
        </div>


    </form>

@endsection

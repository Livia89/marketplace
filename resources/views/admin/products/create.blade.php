@extends('layouts.app')

@section('content')
    <h1>Adicionar um Produto</h1>
    <form enctype="multipart/form-data" action="{{Route('admin.products.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="">Nome da Produto</label>
            <input value='{{old('name')}}' class="form-control @error('name') is-invalid @enderror"  type="text" name="name">

            @error('name')
                <div class="invalid-feedback">
                {{$message}}
                </div>
            @enderror
        </div>

        
        <div class="mb-3">
            <label for="">Descrição</label>
            <input value='{{old('description')}}' class="form-control @error('description') is-invalid @enderror" type="text" name="description">
            @error('description')
              <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Preço</label>
            <input value='{{old('price')}}' class="form-control @error('price') is-invalid @enderror" type="text" name="price">

            @error('price')
                <div class="invalid-feedback">
                  {{$message}}
              </div>
            @enderror
        </div>   
        
        <div class="mb-3">
            <label for="">body</label><br>
            <textarea name="body" class="form-control @error('body') is-invalid @enderror"  id="" cols="30" rows="10">{{old('body')}}</textarea>
          
            @error('body')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
             @enderror

        </div>
        <div class="mb-3">
            <label for="">Categorias</label>
            <select name="categories[]" id="" class="form-control" multiple>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="">Fotos do Produto</label>
            <input type="file" name='photos[]' class="form-control @error('photos.*') is-invalid @enderror" multiple>

               @error('photos.*')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror

        </div>
        
        <div class="mb-3">
            <button class="btn btn-lg btn-success" type="submit">Criar produto</button>
        </div>


    </form>

@endsection

@extends('layouts.app')

@section('content')
    <h1>Atualizar Produto</h1>

    <form enctype="multipart/form-data" action="{{Route('admin.products.update', $products->id)}}" method="post">
        {{-- <input type="hidden" name='_token' value="{{csrf_token()}}">
        <input type="hidden" name='_method' value="PUT"> --}}
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="">Nome da Produto</label>
            <input value='{{$products->name}}' class="form-control @error('name') is-invalid @enderror" type="text" name="name">
             
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
             @enderror

        </div>
        <div class="mb-3">
            <label for="">Preço</label>
            <input value='{{$products->price}}' class="form-control @error('price') is-invalid @enderror" type="text" name="price">
             
            @error('price')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
             @enderror

        </div>   

        <div class="mb-3">
            <label for="">Descrição</label>
            <input value='{{$products->description}}' class="form-control @error('description') is-invalid @enderror" type="text" name="description">
             
            @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
             @enderror

        </div>

        <div class="mb-3">
            <label for="">Conteúdo</label>
            <textarea name="body" class="form-control @error('body') is-invalid @enderror"  id="" cols="30" rows="10">{{$products->body}}</textarea>
             
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
                    
                    <option value="{{$category->id}}"
                        @if ($products->categories->contains($category))
                            selected
                        @endif
                        >{{$category->name}}</option>
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
            <button class="btn btn-lg btn-success" type="submit">Atualizar</button>
        </div>
    </form>
        <hr>
        <div class="row">
            
            
            @foreach ($products->images as $photo)
                <div class="col-md-4 text-center ">
                    <img src='{{ asset('storage/' . $photo->image) }}' class="img-fluid mb-3" > 
                    <form class='d-block' method="post" action="{{ route('admin.photo.remove') }}">
                        @csrf
                        <input type="hidden" name="photoName" value="{{$photo->image}}">
                        <button type='submit' class="btn btn-lg btn-danger">Eliminar</button>
                    </form>
                </div>
            @endforeach
        </div>

@endsection

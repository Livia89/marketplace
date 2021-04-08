@php
    $view = "layouts.app";
@endphp
@if (!auth::check())
    @php
        $view = "layouts.front";
    @endphp
@endif

@extends($view)

@section('content')



<div class="mb-4 row justify-content-end">
    
    <div class="col-md-3">
        <select name="category" id="" class="form-select">
            <option value="" selected>Categorias</option>
                @foreach ($categories as $category)
                     <option value="{{$category->slug}}">{{$category->name}}</option>
                @endforeach
        </select>
    </div>

</div>
<div class="row mb-4">
    @foreach ($products as $key => $p)
        
        <div class="col col-md-4">
            <div class="card">
                @if ($p->images->count())
                     <div class="card-img-top imagemBgDivCard height70 overflow-hidden" style='background-image: url("{{asset('storage/' . $p->images->first()->image)}}")'></div>            
                @else
                    <div class="card-img-top imagemBgDivCard height70 overflow-hidden" style='background-image: url("{{asset('assets/imgs/no-photo.jpg')}}")'></div>
                @endif
                <div class="card-body">
                  <h5 class="card-title height30">{{$p->name}}</h5>
                  <p class="card-text">{{$p->description}}</p>
                  <h4 class="text-right">{{number_format($p->price, '2', ',','.')}}€</h4>
                </div>
                <a href="{{ route('product.single', ['slug'=> $p->slug]) }}" class="btn btn-success">Ver produto</a>
            </div>
        </div>
        @if (($key + 1) % 3 == 0)</div><div class="row mb-4">
            
        @endif
      
    @endforeach
</div>

<div class="row">
    <div class="col-md-12">
        <h3>Lojas em destaque</h3>
        <hr>
    </div>
    @foreach ($stores as $s)
        
    <div class="col-md-4 col">

        @if ($s->logo)
            <img src="{{asset('storage/'. $s->logo)}}" class='img-fluid' alt="Logo da {{$s->name}}">
        @else
            <img src="{{asset('storage/logo/no-logo.png')}}" class='img-fluid' alt="Sem logo">
        @endif
        <h3>{{$s->name}}</h3>
        <p>
            {{$s->description}}
        </p>
    </div>
    @endforeach
</div>
@endsection
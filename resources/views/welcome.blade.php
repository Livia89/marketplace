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
@endsection
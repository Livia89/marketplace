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
    <div class="row">
        <div class="col-6">
            @if ($product->images->count()) 
                <img src="{{asset('storage/' . $product->images->first()->image)}}" class="card-img-top" alt="">
        
                <div class="row">
                    @foreach ($product->images as $imgObj)
                        <div class="mt-2 col-4">
                            <img src="{{asset('storage/' . $imgObj->image)}}" class="img-fluid" alt="">
                        </div>
                    @endforeach
                </div>
            @else
              <img src="{{asset('assets/imgs/no-photo.jpg')}}" class="card-img-top" alt="">    
            @endif
        </div>
        <div class="col-6">
            
            <div class="mb-2 col-md-12">
                <h2>{{$product->name}}</h2>
                <p>{{$product->description}}</p>
                <h3>{{number_format($product->price, '2', ',','.')}}€</h3>
                <span>Loja: {{$product->store->name}}</span>
            </div>

            <div class="product-add col-md-12">
                <hr>
            <form action="{{route('cart.add')}}" method="POST">
                @csrf   
                <input type="hidden" name="product[name]" value="{{$product->name}}">
                <input type="hidden" name="product[price]" value="{{$product->price}}">
                <input type="hidden" name="product[slug]" value="{{$product->slug}}">
                    <div class="form-group">    
                        <label for="">Quantidade</label>
                        <input type="number" name="product[amount]" id="" value='1' class="text-center form-control col-md-3" min="1">
                    </div>
                    <button class="btn btn-large btn-danger">Comprar</button>
            </form>
            </div>

        </div>
    </div>
    <div class="row mt-4">
        <hr>
         <div class="col-12">{{$product->body}}</div>
    </div>
@endsection  
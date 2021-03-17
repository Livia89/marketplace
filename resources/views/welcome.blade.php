@auth
    @extends('layouts.app')
@endauth

@guest
    @extends('layouts.front')
@endguest


@section('content')
<div class="row mb-4">
    @foreach ($products as $key => $p)
        
        <div class="col col-md-4">
            <div class="card">
                @if ($p->images->count())
                    <img src="{{asset('storage/' . $p->images->first()->image)}}" class="card-img-top" alt="">
                @else
                    <img src="{{asset('assets/imgs/no-photo.jpg')}}" class="card-img-top" alt="">    
                @endif
                <div class="card-body">
                  <h5 class="card-title">{{$p->name}}</h5>
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
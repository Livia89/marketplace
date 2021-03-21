<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace L6</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/css/layout/structure.css')}}?<?=rand(1,99999)?>">
    <link rel="stylesheet" href="{{asset('/css/layout/style.css')}}?<?=rand(1,99999)?>">
    <link rel="stylesheet" href="{{asset('/css/shared.css')}}?<?=rand(1,99999)?>"><style>        
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 40px;">

    <a class="navbar-brand" href="{{route('home')}}">Marketplace L6</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item @if(request()->is('/')) active @endif">
                <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>

    {{-- 
           <ul class="navbar-nav mr-auto">
                    <li class="nav-item @if(request()->is('admin/stores*')) active @endif">
                        <a class="nav-link" href="{{route('admin.stores.index')}}">Lojas <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/products*')) active @endif">
                        <a class="nav-link" href="{{route('admin.products.index')}}">Produtos</a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/categories*')) active @endif">
                        <a class="nav-link" href="{{route('admin.categories.index')}}">Categorias</a>
                    </li>
                    @auth
                </ul> --}}
                <div class="my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#" onclick="event.preventDefault();
                                                                  document.querySelector('form.logout').submit(); ">Sair</a>

                            <form action="{{route('logout')}}" class="logout" method="POST" style="display:none;">
                                @csrf
                            </form>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link">{{auth()->user()->name}}</span>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{route('login')}}" class="nav-link"><i class="far fa-user"></i> Login </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cart.index') }}" class="nav-link ">
                                <span class="badge badge-danger">
                                @if (session()->has('cart'))
                                    {{count(session()->get('cart'))}} 
                                    <!-- <span class="badge-danger">{{array_sum(array_column(session()->get('cart'), 'amount'))}}</span> -->
                                @endif
                                <i class="fa fa-shopping-cart"></i> </span>
                                
                                
                            </a>
                        </li>
                    </ul>
                </div>
        {{-- @endauth --}}

    </div>
</nav>

<div class="container">
    @include('flash::message')
    @yield('content')
</div>
</body>
</html>
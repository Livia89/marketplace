
<div class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('home')}}">Marketplace</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
       
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link @if(request()->is('admin/stores*')) active @endif" aria-current="page" href="{{route('admin.stores.index')}}">Lojas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @if(request()->is('admin/products*')) active @endif " href="{{route('admin.products.index')}}">Produtos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @if(request()->is('admin/categories*')) active @endif " href="{{route('admin.categories.index')}}">Categorias</a>
                </li>
              
              </ul>   
              <div class="d-flex">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                    <li class="nav-item">
                      <span class="nav-link">{{auth()->user()->name}}</span>
                    </li>

                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href='#' 
                        onclick="event.preventDefault(); document.querySelector('form.logout').submit()">Sair</a>
                        <form action="{{route('logout')}}" method='POST' class="logout" style="display: none">@csrf</form>
                      </li>
                     
                    </ul>
              </div>
            @endauth
          </div>

        </div>
      </nav>
</div>
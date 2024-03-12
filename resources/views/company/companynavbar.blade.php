<div>
    <nav>
        <a href="{{url('/')}}"><img src="{{ asset('images/platform/logo.png') }}" style="height:60px; width:auto;"></img></a>
        <a href="{{url('/'.Auth::user()->role.'/dashboard')}}"><i class="bi bi-speedometer"></i> Visão geral</a>
        <a href="{{url('/'.Auth::user()->role.'/catalog')}}"><i class="bi bi-list-task"></i> Catálogo de produtos</a>
        <a href="{{url('/'.Auth::user()->role.'/orders')}}"><i class="bi bi-truck"></i> Encomendas recebidas</a>
        <a href="{{url('/'.Auth::user()->role.'/profile')}}"><i class="bi bi-person-fill"></i> Perfil</a>
        <form action="{{ url('/auth/logout') }}" method="POST">
            @csrf
          <button type="submit"><i class="bi bi-box-arrow-right"></i> Terminar sessão</button>
        </form>
    </nav>
    <div class="avatar-navbar">
        @if (Auth::user()->image)
        <img src="{{ asset('images/profiles/'.Auth::user()->image) }}" alt="Avatar">
        @else
        <img src="{{ asset('images/profiles/default.png') }}" alt="Avatar">
        @endif
    </div>
</div>

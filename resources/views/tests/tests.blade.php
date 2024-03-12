page test to check login

<nav>
    <form action="{{ url('/auth/logout') }}" method="POST">
        @csrf
        <button type="submit">Sair</button>
    </form>
 </nav>

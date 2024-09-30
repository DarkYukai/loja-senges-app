<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- href="route('site.home')" -->
        <!-- logo ou nome da empresa -->
        <a href="/" class="navbar-brand">Loja Senges</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!--primeiro link-->
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                <!--colocar o dropdown-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorias
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($categoriasMenu as $categoria)
                        <li><a class="dropdown-item" href="/site/categoria/{{$categoria->id}}">{{$categoria->nome}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Contato</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/carrinho">Carrinho</a>
                </li>
            </ul>
            <!--se tiver logado mostre o perfil-->
            <!--se tiver deslogado mostre o login-->
            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item">
                    <a href="/" class="nav-link dropdown-toggle"
                        id="userDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ auth()->user()->name}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a href="#" class="dropdown-item">Perfil</a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item">Sair</a>
                        </li>
                    </ul>
                </li>

                @else

                <li class="nav-item">
                    <a href="/" class="nav-link">
                        Login
                    </a>
                </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
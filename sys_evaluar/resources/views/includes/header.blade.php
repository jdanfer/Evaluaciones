<nav id="header" class="navbar navbar-expand-md fixed-top navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img id="header-logo" src="{{ asset('img/logoev2.png') }}" alt="Evaluaciones" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#links" aria-controls="links" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="links" class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Evaluaciones
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/autoevaluacion') }}"><i class="fas fa-chart-line"></i> Autoevaluación</a>
                        <a class="dropdown-item" href="{{ url('/evaluacion') }}"><i class="fas fa-list"></i> Evaluación</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/comofunciona') }}">Cómo funciona?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#contacto-modal">Contacto</a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Administrador
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/admin/titulos') }}"><i class="fas fa-list"></i> Ver títulos</a>
                                <a class="dropdown-item" href="{{ url('/admin/titulos/crear') }}"><i class="far fa-plus-square"></i> Agregar título</a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ url('/admin/cargos') }}"><i class="fas fa-list"></i> Ver cargos</a>
                                <a class="dropdown-item" href="{{ url('/admin/cargos/crear') }}"><i class="far fa-plus-square"></i> Agregar cargos</a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ url('/admin/evaluadores') }}"><i class="fas fa-list"></i> Ver evaluadores</a>
                                <a class="dropdown-item" href="{{ url('/admin/evaluadores/crear') }}"><i class="far fa-plus-square"></i> Agregar Evaluador</a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ url('/admin/preguntas') }}"><i class="fas fa-list"></i> Ver preguntas</a>
                                <a class="dropdown-item" href="{{ url('/admin/preguntas/crear') }}"><i class="far fa-plus-square"></i> Agregar preguntas</a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ url('/admin/personas') }}"><i class="fas fa-list"></i> Ver personas</a>
                                <a class="dropdown-item" href="{{ url('/admin/personas/crear') }}"><i class="far fa-plus-square"></i> Agregar persona</a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ url('/admin/periodos') }}"><i class="fas fa-list"></i> Ver períodos</a>
                                <a class="dropdown-item" href="{{ url('/admin/periodos/crear') }}"><i class="far fa-plus-square"></i> Agregar período</a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fas fa-sign-out-alt"></i> Cerrar sesión {{ Auth::user()->name}}</a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registro</a>
                        </li>
                    @endauth
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img id="header-logo" src="{{ asset('img/logoev2.png') }}" alt="Evaluaciones" />
                </a>

            </div><!-- /.col -->
            <div class="col-md-3">
                <ul>
                    <li><a href="{{ url('/comofunciona') }}">Cómo funciona?</a></li>
<!--                    <li><a href="{{ url('/ventas?status=0') }}">Venta Usados</a></li> -->
                </ul>
            </div><!-- /.col -->
            <div class="col-md-3">
                <ul>
                    <li><a href="{{ url('/nosotros') }}">Sobre Nosotros</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#contacto-modal">Contacto</a></li>
                </ul>
            </div><!-- /.col -->
            <div class="col-md-3">
                <p style="color:#DDD;">Copyright &copy; Evaluaciones {{ date("Y") }}</p>
            </div><!-- /.col -->
        </div><!-- /.row -->

    </div><!-- /.container -->
</div><!-- /#footer -->

@extends('layouts.master')

@section('content')

<div id="about-us">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sobre Nosotros</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <img id="company-photo" class="img-thumbnail img-fluid" src="{{ asset('img/about_us/somos1.jpg') }}" alt="Sobre AUTOVIP">
            </div>
            <div class="col-md-6">
                <h2><span>EVALUACIONES</span><strong>FREE</strong></h2>
                <p>Nuestro sitio pretende que cualquier empresa que se registre, pueda realizar en forma totalmente gratuita</p>
                <p>Las EVALUACIONES del Personal. Teniendo total control sobre los datos ingresados y pudiendo descargar los mismos</p>
                <p>a planillas electrónicas o documentos en PDF para tenerlos como respaldo.</p>
                <p>
                    <button type="button" name="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#contacto-modal"><i class="far fa-envelope"></i> Contacto</button>
                </p>
            </div>
        </div><!-- /.row -->

        <!-- Equipo -->
        <h2 class="page-header">Nuestro Equipo</h2>
        <div class="card-deck">
            <div class="card text-center">
                <img class="card-img-top" src="{{ asset('img/about_us/cofounder_1.jpg') }}" alt="Co-Fundador">
                <div class="card-body">
                    <h3 class="card-title">
                        Juan Pérez<br>
                        <small>Co-Fundador</small>
                    </h3>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime. This content is a little bit longer.</p>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#"><i class="fab fa-2x fa-facebook-square"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><i class="fab fa-2x fa-linkedin"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><i class="fab fa-2x fa-twitter-square"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card text-center">
                <img class="card-img-top" src="{{ asset('img/about_us/cofounder_2.jpg') }}" alt="Co-Fundador">
                <div class="card-body">
                    <h3 class="card-title">
                        María Rodríguez<br>
                        <small>Co-Fundador</small>
                    </h3>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.</p>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#"><i class="fab fa-2x fa-facebook-square"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><i class="fab fa-2x fa-linkedin"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><i class="fab fa-2x fa-twitter-square"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card text-center">
                <img class="card-img-top" src="{{ asset('img/about_us/cofounder_3.jpg') }}" alt="Co-Fundador">
                <div class="card-body">
                    <h3 class="card-title">
                        Juan Gómez<br>
                        <small>Co-Fundador</small>
                    </h3>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime. This card has even longer content than the first to show that equal height action.</p>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#"><i class="fab fa-2x fa-facebook-square"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><i class="fab fa-2x fa-linkedin"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><i class="fab fa-2x fa-twitter-square"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- /.card-deck -->

    </div><!-- /.container -->
</div><!-- /#about-us -->


@endsection
@extends('layouts.master')

@section('content')

    <div class="container mt-4">
        
        @include('admin.message')
        
        <h1>Crear AutoEvaluación</h1>

        <form action="" method="">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="documento">Ingrese documento</label>
                        <input type="text" class="form-control" id="documento" name="documento" maxlength="10" placeholder="Ingrese documento a buscar">
                    </div>    
                </div>
                <div class="col-sm-6">
                    <br>
                    <button id="btn-filter" type="submit" name="button" class="btn btn-warning btn-lg">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                </div>
            </div>
        </form>
        @if (isset($datospersona))
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Evaluador</th>
                        <th>Autoevaluar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datospersona as $datoperson)
                        <tr>
                            <th>{{ $datoperson->persona_nom1 }}  {{$datoperson->persona_ape1}}</th>
                            <td>{{ $datoperson->cargo->descrip }}</td>
                            <td>{{ $datoperson->cargo->jefatura->descrip }}</td>
                            <td style="width: 200px;">
                                <a href="{{ url('/autoevaluacion/crear/' . $datoperson->persona_doc ) }}" class="btn btn-sm btn-primary">Autoevaluar</a>
                            </td>    
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @endif
    </div><!-- /.container -->

@endsection

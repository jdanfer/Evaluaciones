@extends('layouts.master')

@section('content')


    <div class="container mt-4">

        @include('admin.message')
        
        <h1>Autoevaluación para: {{ $persona->persona_nom1 }} {{ $persona->persona_ape1 }}  </h1>
        <form action="" method="">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="titulo_id">Título de la pregunta</label>
                        <select id="titulo_id" class="form-control input-sm" name="titulo_id">
                            <option value="">Seleccionar...</option>
                            @foreach ($titulos as $titulo)
                               @if (request('titulo_id') == $titulo->id)
                                  <option value="{{ $titulo->id }}" selected>{{ $titulo->descrip }}</option>
                               @else
                                  <option value="{{ $titulo->id }}">{{ $titulo->descrip }}</option>
                               @endif
                            @endforeach
                        </select>
                    </div>    
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="periodo_id">Seleccione período</label>
                        <select id="periodo_id" class="form-control input-sm" name="periodo_id">
                            <option value="">Seleccionar...</option>
                            @foreach ($periodos as $periodo)
                               @if (request('periodo_id') == $periodo->id)
                                    <option value="{{ $periodo->id }}" selected>{{ $periodo->descrip }}</option>
                               @else
                                   <option value="{{ $periodo->id }}">{{ $periodo->descrip }}</option>
                               @endif
                            @endforeach
                        </select>
                    </div>    
                </div>
                <div class="col-sm-3">
                    <br>
                    <button id="btn-filter" type="submit" name="button" class="btn btn-warning btn-lg">
                        <i class="fas fa-search"></i> Consultar
                    </button>
                </div>
            </div>
        </form>
            @if (isset($datospreguntas))
                    <table class="table table-primary table-striped">
                        <thead>
                            <tr>
                            <th>Nro.</th>
                            <th>Pregunta</th>
                            <th>Puntaje</th>
                            <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datospreguntas as $datopregunta)
                                <tr>
                                    <th>{{ $datopregunta->pregunta_nro }}</th>
                                    <td>{{ $datopregunta->descrip }}</td>
                                    @if (isset($datosautoeval))
                                        @foreach ($datosautoeval as $datoautoeval)
                                            @if ($datoautoeval->pregunta_id==$datopregunta->id)
                                                <td>{{ $datoautoeval->puntos }}</td>
                                            @else
                                                <td>Sin puntaje</td>
                                            @endif
                                        @endforeach
                                    @else
                                        <td>Sin puntaje</td>
                                    @endif
                                    <td style="width: 200px;">
                                        <a href="{{ url('/autoevaluacion/' . $datopregunta->id . '/' . $persona->id . '/' . $periodo->descrip . '/editar') }}" class="btn btn-sm btn-primary">Editar</a>

                                    </td>
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
            @endif

    </div><!-- /.container -->

@endsection

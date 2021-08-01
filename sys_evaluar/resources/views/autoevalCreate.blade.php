@extends('layouts.master')

@section('content')

    <div class="container mt-4">
        
        @include('admin.message')
        
        <h1>Autoevaluación para {{ $persona->persona_ape1 }} {{ $persona->persona_nom1 }} </h1>

        <form action="" method="">
            <div class="form-group">
                <label for="select-titulo">Título de la pregunta</label>
                <select id="select-titulo" class="form-control input-sm" name="titulo_id">
                    <option value="">Seleccionar...</option>
                    @foreach ($titulos as $titulo)
                            <option value="{{ $titulo->id }}">{{ $titulo->descrip }}</option>
                    @endforeach
                </select>
            </div>

        </form>
            
    </div><!-- /.container -->

@endsection

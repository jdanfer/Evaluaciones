@extends('layouts.master')

@section('content')

    <div id="admin-edit" class="container mt-4" style="max-width:600px;">

        @include('admin.message')
        @include('admin.errors')

        <h1>Crear Preguntas</h1>

        <form action="{{ url('/admin/preguntas/') }}" method="post">

            @csrf
            <div class="form-group">
                <label for="name">Número de Pregunta</label>
                <input type="number" class="form-control" id="pregunta_nro" name="pregunta_nro">
            </div>
            <div class="form-group">
                <label for="descrip">Descripción</label>
                <textarea class="form-control" id="descrip" rows="4" name="descrip" placeholder="Ingrese texto de la pregunta..." value="{{old('descrip','')}}"></textarea>
            </div>

            <div class="form-group">
                <label for="select-titulo">Título de la pregunta</label>
                <select id="select-titulo" class="form-control input-sm" name="titulo_id">
                    <option value="">Seleccionar...</option>
                    @foreach ($titulos as $titulo)
                            <option value="{{ $titulo->id }}">{{ $titulo->descrip }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="select-jefatura">Jefatura a la que corresponde</label>
                <select id="select-jefatura" class="form-control input-sm" name="jefatura_id">
                    <option value="">Seleccionar...</option>
                    @foreach ($jefaturas as $jefatura)
                        @if (old('jefatura_id') == $jefatura->id)
                            <option value="{{ $jefatura->id }}" selected>{{ $jefatura->descrip }}</option>
                        @else
                            <option value="{{ $jefatura->id }}">{{ $jefatura->descrip }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Agregar</button>

        </form>

    </div><!-- /.container -->

@endsection

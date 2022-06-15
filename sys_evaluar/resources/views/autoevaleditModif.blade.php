@extends('layouts.master')

@section('content')
    <div id="admin-edit" class="container mt-4" style="max-width:600px;">

        @include('admin.message')
        @include('admin.errors')

        <h1>Funcionario: {{ $persona->persona_nom1 }} {{ $persona->persona_ape1 }}</h1>
        <form action="{{ url('/autoevaluacion/' . $pregunta->id . '/' . $persona->id . '/' . $periodo . '/editar') }}" method="post">

            @csrf
            <div class="form-group">
                <label for="FechaActual">Fecha actual</label>
                <input type="date" class="form-control" id="FechaActual" name="FechaActual" style="width: 200px">
            </div>

            <div class="form-group">
                <label for="descrip">Pregunta</label>
                <textarea class="form-control" style="width: 600px" id="descrip" name ="descrip" rows="4" disabled>{{ $pregunta->pregunta_nro }}. {{ $pregunta->descrip }}</textarea>
                <input type="hidden" class="form-control" id="id" name="id" value="{{ $pregunta->id }}">
            </div>
            <div class="form-group">
                <label for="puntos">Puntaje</label>
                @if (isset($evalua))
                   <input type="number" class="form-control" id="puntos" name="puntos" max="5" min="1" style="width: 100px" value="{{ old('puntos', $evalua->puntos) }}">
                @else
                   <input type="number" class="form-control" id="puntos" name="puntos" max="5" min="1" style="width: 100px" value="1">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>

        </form>

    </div><!-- /.container -->
    <script src={{ asset('js/miprueba.js') }}></script>
@endsection

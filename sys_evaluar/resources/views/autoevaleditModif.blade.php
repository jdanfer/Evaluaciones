@extends('layouts.master')

@section('content')
    <div id="admin-edit" class="container mt-4" style="max-width:600px;">

        @include('admin.message')
        @include('admin.errors')

        <h1>Funcionario: {{ $persona->persona_nom1 }} {{ $persona->persona_ape1 }}</h1>
        <form action="{{ url('/autoevaluacion/{id}/{persona_id}/{periodo}/editar') }}" method="post">

            @csrf
            <div class="form-group">
                <label for="FechaActual">Fecha actual</label>
                <input type="date" class="form-control" id="FechaActual" name="FechaActual">
            </div>

            <div class="form-group">
                <label for="descrip">Pregunta</label>
                <textarea class="form-control" style="width: 600px" id="descrip" name ="descrip" rows="4">{{ $pregunta->pregunta_nro }}. {{ $pregunta->descrip }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Modificar</button>

        </form>

    </div><!-- /.container -->
    <script src={{ asset('js/miprueba.js') }}></script>
@endsection

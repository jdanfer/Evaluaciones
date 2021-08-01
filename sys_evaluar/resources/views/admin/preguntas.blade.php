@extends('layouts.master')

@section('content')

    <div class="container mt-4">
        
        @include('admin.message')
        
        <h1>Preguntas</h1>
        
        <table class="table table-primary table-striped">
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Descripción</th>
                    <th>Título</th>
                    <th>Jefatura</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($preguntas as $pregunta)
                    <tr>
                        <th>{{ $pregunta->pregunta_nro }}</th>
                        <td>{{ $pregunta->descrip }}</td>
                        <td>{{ $pregunta->titulo->descrip }}</td>
                        <td>{{ $pregunta->jefatura->descrip }}</td>
                        <td style="width: 200px;">
                            <a href="{{ url('/admin/preguntas/' . $pregunta->id . '/editar') }}" class="btn btn-sm btn-primary">Editar</a> <a href="{{ url('/admin/preguntas/' . $pregunta->id . '/eliminar') }}" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div><!-- /.container -->

@endsection

@extends('layouts.master')

@section('content')

    <div class="container mt-4">
        
        @include('admin.message')
        
        <h1>Listado de Cargos</h1>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripción</th>
                    <th>Evaluador</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cargos as $cargo)
                    <tr>
                        <th>{{ $cargo->id }}</th>
                        <td>{{ $cargo->descrip }}</td>
                        <td>{{ $cargo->jefatura->descrip }}</td>
                        <td style="width: 200px;">
                            <a href="{{ url('/admin/cargos/' . $cargo->id . '/editar') }}" class="btn btn-sm btn-primary">Editar</a> <a href="{{ url('/admin/cargos/' . $cargo->id . '/eliminar') }}" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <a href="{{ url('/') }}" class="btn btn-sm btn-primary">Volver al inicio</a>


    </div><!-- /.container -->

@endsection

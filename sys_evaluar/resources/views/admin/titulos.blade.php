@extends('layouts.master')

@section('content')

    <div class="container mt-4">
        
        @include('admin.message')
        
        <h1>Listado de Títulos</h1>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($titulos as $titulo)
                    <tr>
                        <th>{{ $titulo->id }}</th>
                        <td>{{ $titulo->descrip }}</td>
                        <td style="width: 200px;">
                            <a href="{{ url('/admin/titulos/' . $titulo->id . '/editar') }}" class="btn btn-sm btn-primary">Editar</a>
                            <a href="{{ url('/admin/titulos/' . $titulo->id . '/eliminar') }}" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div><!-- /.container -->

@endsection

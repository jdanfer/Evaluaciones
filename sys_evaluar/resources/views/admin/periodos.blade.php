@extends('layouts.master')

@section('content')

    <div class="container mt-4">
        
        @include('admin.message')
        
        <h1>Listado de Períodos ingresados</h1>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripción de período</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($periodos as $periodo)
                    <tr>
                        <th>{{ $periodo->id }}</th>
                        <td>{{ $periodo->descrip }}</td>
                        <td style="width: 200px;">
                            <a href="{{ url('/admin/periodos/' . $periodo->id . '/editar') }}" class="btn btn-sm btn-primary">Editar</a>
                            <a href="{{ url('/admin/periodos/' . $periodo->id . '/eliminar') }}" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div><!-- /.container -->

@endsection

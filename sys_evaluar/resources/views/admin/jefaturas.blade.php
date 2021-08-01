@extends('layouts.master')

@section('content')

    <div class="container mt-4">
        
        @include('admin.message')
        
        <h1>Listado de Evaluadores</h1>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre Evaluador</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jefaturas as $jefatura)
                    <tr>
                        <th>{{ $jefatura->id }}</th>
                        <td>{{ $jefatura->descrip }}</td>
                        <td style="width: 200px;">
                            <a href="{{ url('/admin/evaluadores/' . $jefatura->id . '/editar') }}" class="btn btn-sm btn-primary">Editar</a>
                            <a href="{{ url('/admin/evaluadores/' . $jefatura->id . '/eliminar') }}" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div><!-- /.container -->

@endsection

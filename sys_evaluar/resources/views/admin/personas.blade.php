@extends('layouts.master')

@section('content')

    <div class="container mt-4">
        
        @include('admin.message')
        
        <h1>Personas</h1>
        <form action="" method="">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="filtro">Seleccione filtro</label>
                        <select id="filtro" class="form-control input-sm" name="filtro">
                            <option value="">Seleccionar...</option>
                            <option value="Apellidos" selected>Apellidos</option>
                            <option value="Documento" selected>Documento</option>
                        </select>
                    </div><!-- /.form-group -->    
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="descrip">Texto a buscar</label>
                        <input type="text" class="form-control" id="descrip" name="descrip" maxlength="50" placeholder="Ingrese texto a buscar">
                    </div>    
                </div>
                <div class="col-sm-4">
                    <br>
                    <button id="btn-filter" type="submit" name="button" class="btn btn-warning btn-lg">
                        <i class="fas fa-search"></i> Filtrar
                    </button>
                </div>
            </div>
        </form>
            
        <table class="table table-primary table-striped">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personas as $persona)
                    <tr>
                        <th>{{ $persona->persona_doc }}</th>
                        <td>{{ $persona->persona_nom1 }}</td>
                        <td>{{ $persona->persona_ape1 }}</td>
                        <td>{{ $persona->cargo->descrip }}</td>
                        <td style="width: 200px;">
                            <a href="{{ url('/admin/personas/' . $persona->id . '/editar') }}" class="btn btn-sm btn-primary">Editar</a> <a href="{{ url('/admin/personas/' . $persona->id . '/eliminar') }}" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div><!-- /.container -->

@endsection

@extends('layouts.master')

@section('content')

    <div id="admin-edit" class="container mt-4" style="max-width:600px;">

        @include('admin.message')
        @include('admin.errors')

        <h1>Crear Persona</h1>

        <form action="{{ url('/admin/personas/') }}" method="post">

            @csrf
            <div class="form-group">
                <label for="persona_doc">Documento</label>
                <input type="text" class="form-control" id="persona_doc" name="persona_doc" maxlength="20">
            </div>
            <div class="form-group">
                <label for="persona_nom1">Nombres</label>
                <input type="text" class="form-control" id="persona_nom1" name="persona_nom1" maxlength="50" placeholder="Ingrese primer nombre" value="{{old('persona_nom1','')}}">
                <input type="text" class="form-control" id="persona_nom2" name="persona_nom2" maxlength="50" placeholder="Ingrese segundo nombre" value="{{old('persona_nom2','')}}">
            </div>
            <div class="form-group">
                <label for="persona_ape1">Apellidos</label>
                <input type="text" class="form-control" id="persona_ape1" name="persona_ape1" maxlength="50" placeholder="Ingrese primer apellido" value="{{old('persona_ape1','')}}">
                <input type="text" class="form-control" id="persona_ape2" name="persona_ape2" maxlength="50" placeholder="Ingrese segundo apellido" value="{{old('persona_ape2','')}}">
            </div>
            <div class="form-group">
                <label for="persona_ingreso">Fecha de Ingreso</label>
                <input type="date" class="form-control" id="persona_ingreso" name="persona_ingreso">
            </div>
            <div class="form-group">
                <label for="persona_nac">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="persona_nac" name="persona_nac">
            </div>
            <div class="form-group">
                <label for="persona_genero">Género</label>
                <select id="persona_genero" class="form-control input-sm" name="persona_genero">
                    <option selected>Seleccionar...</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                </select>
            </div><!-- /.form-group -->

            <div class="form-group">
                <label for="cargo_id">Cargo</label>
                <select id="cargo_id" class="form-control input-sm" name="cargo_id">
                    <option value="">Seleccionar...</option>
                    @foreach ($cargos as $cargo)
                            <option value="{{ $cargo->id }}">{{ $cargo->descrip }}</option>
                    @endforeach
                </select>

            </div>

            <button type="submit" class="btn btn-primary">Agregar</button>

        </form>

    </div><!-- /.container -->

@endsection

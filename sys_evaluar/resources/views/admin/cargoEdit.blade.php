@extends('layouts.master')

@section('content')

    <div id="admin-edit" class="container mt-4" style="max-width:600px;">

        @include('admin.message')
        @include('admin.errors')

        <h1>Editar Cargos</h1>

        <form action="{{ url('/admin/cargos/' . $cargo->id . '/editar') }}" method="post">

            @csrf

            <div class="form-group">
                <label for="select-jefatura">Jefatura</label>
                <select id="select-jefatura" class="form-control input-sm" name="jefatura_id">
                    <option value="">Seleccionar...</option>
                    @foreach ($jefaturas as $jefatura)
                        @if (old('jefatura_id', $cargo->jefatura_id) == $jefatura->id)
                            <option value="{{ $jefatura->id }}" selected>{{ $jefatura->descrip }}</option>
                        @else
                            <option value="{{ $jefatura->id }}">{{ $jefatura->descrip }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Descripción</label>
                <input type="text" class="form-control" id="descrip" name="descrip" placeholder="Ingresar cargo..." value="{{ old('descrip', $cargo->descrip) }}">
            </div>

            <button type="submit" class="btn btn-primary">Modificar</button>

        </form>

    </div><!-- /.container -->

@endsection

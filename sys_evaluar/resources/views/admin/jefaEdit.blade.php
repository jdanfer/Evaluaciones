@extends('layouts.master')

@section('content')

    <div id="admin-edit" class="container mt-4" style="max-width:600px;">

        @include('admin.message')
        @include('admin.errors')

        <h1>Editar Nombre de Evaluador</h1>

        <form action="{{ url('/admin/evaluadores/' . $jefatura->id . '/editar') }}" method="post">

            @csrf

            <div class="form-group">
                <label for="descrip">Nombre de Evaluador</label>
                <input type="text" class="form-control" id="descrip" name="descrip" placeholder="Ingresar nombre de evaluador..." value="{{ old('descrip', $jefatura->descrip) }}">
            </div>

            <button type="submit" class="btn btn-primary">Modificar</button>

        </form>

    </div><!-- /.container -->

@endsection

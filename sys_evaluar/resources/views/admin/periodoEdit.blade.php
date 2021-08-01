@extends('layouts.master')

@section('content')

    <div id="admin-edit" class="container mt-4" style="max-width:600px;">

        @include('admin.message')
        @include('admin.errors')

        <h1>Editar Períodos</h1>

        <form action="{{ url('/admin/periodos/' . $periodo->id . '/editar') }}" method="post">

            @csrf

            <div class="form-group">
                <label for="descrip">Descripción del período</label>
                <input type="text" class="form-control" id="descrip" name="descrip" placeholder="Ingresar descrip de período..." value="{{ old('descrip', $periodo->descrip) }}">
            </div>

            <button type="submit" class="btn btn-primary">Modificar</button>

        </form>

    </div><!-- /.container -->

@endsection

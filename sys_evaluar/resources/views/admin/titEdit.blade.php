@extends('layouts.master')

@section('content')

    <div id="admin-edit" class="container mt-4" style="max-width:600px;">

        @include('admin.message')
        @include('admin.errors')

        <h1>Editar Título</h1>

        <form action="{{ url('/admin/titulos/' . $titulo->id . '/editar') }}" method="post">

            @csrf

            <div class="form-group">
                <label for="descrip">Título</label>
                <input type="text" class="form-control" id="descrip" name="descrip" placeholder="Ingresar título..." value="{{ $titulo->descrip }}">
            </div>

            <button type="submit" class="btn btn-primary">Editar</button>

        </form>

    </div><!-- /.container -->

@endsection

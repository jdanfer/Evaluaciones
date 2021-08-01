@extends('layouts.master')

@section('content')

    <div id="admin-edit" class="container mt-4" style="max-width:600px;">

        @include('admin.message')
        @include('admin.errors')

        <h1>Agregar Período</h1>

        <form action="{{ url('/admin/periodos/') }}" method="post">

            @csrf

            <div class="form-group">
                <label for="descrip">Descripción del período</label>
                <input type="text" class="form-control" id="descrip" name="descrip" placeholder="Ingresar descrip de período...">
            </div>

            <button type="submit" class="btn btn-primary">Agregar</button>

        </form>

    </div><!-- /.container -->

@endsection

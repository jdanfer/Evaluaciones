@extends('layouts.master')

@section('content')

    <div id="admin-edit" class="container mt-4" style="max-width:600px;">

        @include('admin.message')
        @include('admin.errors')

        <h1>Agregar Evaluador</h1>

        <form action="{{ url('/admin/evaluadores/') }}" method="post">

            @csrf

            <div class="form-group">
                <label for="descrip">Nombre de Evaluador</label>
                <input type="text" class="form-control" id="descrip" name="descrip" placeholder="Ingresar nombre de evaluador..." value="{{old('descrip','')}}">
            </div>

            <button type="submit" class="btn btn-primary">Agregar</button>

        </form>

    </div><!-- /.container -->

@endsection

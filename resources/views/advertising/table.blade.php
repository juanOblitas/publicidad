@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-12">
            <div class="card">
                <div class="card-header">Crear Plantillas</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!--Indicar número de filas y columnas maximas-->
                    
                    <form action="/generateTable" method="post">
                      <div class="form-group">
                        @csrf
                        <label for="rows">Filas</label>
                        <input type="number" class="form-control @if(!$is_numeric_row or $error_row!='') is-invalid @endif" id="rows" name="rows">
                        @if(!$is_numeric_row)
                            <div class="invalid-feedback">Debe ser un número</div>
                        @elseif($error_row!='')
                            <div class="invalid-feedback">{{ $error_row }}</div>
                        @endif
                      </div>
                      <div class="form-group">
                        @csrf
                        <label for="columns">Columnas</label>
                        <input type="number" class="form-control @if(!$is_numeric_column or $error_column!='') is-invalid @endif" id="columns" name="columns">
                        @if(!$is_numeric_column)
                            <div class="invalid-feedback">Debe ser un número</div>
                        @elseif($error_column!='')
                            <div class="invalid-feedback">{{ $error_column }}</div>
                        @endif
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <!--Fin filas y columnas-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
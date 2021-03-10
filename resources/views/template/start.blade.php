@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-12">
            <div class="card">
                <div class="card-header">Indicar el número de filas y columnas maximo de la plantilla</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!--Indicar número de filas y columnas maximas-->
                    
                    <form action="/templates/structure" method="post">
                      <div class="form-group">
                        @csrf
                        <label for="rows">Filas</label>
                        <input type="number" class="form-control @if($errors->has('rows')) is-invalid @endif" id="rows" name="rows">
                    @if($errors->any())
                        @foreach($errors->get('rows') as $error)
                        <div class="invalid-feedback">{{ $error }}</div>
                        @endforeach
                    @endif
                      </div>
                      <div class="form-group">
                        @csrf
                        <label for="columns">Columnas</label>
                        <input type="number" class="form-control @if($errors->has('columns')) is-invalid @endif" id="columns" name="columns">
                    @if($errors->any())
                        @foreach($errors->get('columns') as $error)
                        <div class="invalid-feedback">{{ $error }}</div>
                        @endforeach
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



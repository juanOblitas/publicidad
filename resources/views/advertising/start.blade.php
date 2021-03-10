@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Plantillas</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!--Aqui ponemos las cajas-->
                    <div class="row">
                        @foreach($images as $image)
                            <div class="{{ $col }}">
                                <div class="row ml-0 mr-0">
                                    <!-- Coger las urls-->
                            @foreach($image['img'] as $key => $value)
                                    <div class="p-0 {{ $value['size'] }}">
                                        <img src="{{ $value['url'] }}" alt="" class="col-12 p-0">
                                    </div>
                            @endforeach
                                </div>
                                <form action="/" method="POST">
                                    @csrf
                                    <!--<input type="text" value="{{ count($image['img']) }}">-->
                                    <button type="button" class="btn btn-secondary btn-lg btn-block mt-1 pt-0 pb-0">Selecciona</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                    <!--Fin cajas-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
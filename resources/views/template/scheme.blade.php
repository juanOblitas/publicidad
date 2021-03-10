@extends('layouts.app')

@section('content')
<input type="text" class="form-control" value="{{ $filas }}" disabled id='matriz'>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-9 col-md-8 col-lg-8">
            <div class="card">
                <div class="card-header">Crea Plantilla</div>
                
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    <div class="row">
                        
                        <div class="form-group mt-1 ml-1">
                            <label for="">Color</label>
                            <input type="color" id="favcolor" name="favcolor" value="#212529" class="form-control ancho_input_color" disabled>
                        </div>

                        <div class="form-group mt-1 ml-1">
                            <input type="checkbox" id="bgenabled" class="mr-1" disabled><label for="">Background</label>
                            <input type="color" id="bgcolor" name="bgcolor" value="#212529" class="form-control ancho_input_color" disabled>
                            <input type="checkbox" id="bgtotal" class="mr-1" disabled><label for="bgtotal">Ancho total</label>
                        </div>
                        <!--
                        <div class="form-group mt-1 ml-1">
                            <label for="">Opacidad bg</label>
                            <select class="form-control form-control-sm" id="opacitybg" disabled>
                                <option value="0.1">0.1</option>
                                <option value="0.2">0.2</option>
                                <option value="0.3">0.3</option>
                                <option value="0.4">0.4</option>
                                <option value="0.5">0.5</option>
                                <option value="0.6">0.6</option>
                                <option value="0.7">0.7</option>
                                <option value="0.8">0.8</option>
                                <option value="0.9">0.9</option>
                                <option value="1">1</option>
                            </select>
                        </div>-->

                        <div class="form-group mt-1 ml-1">
                            <label for="">Direcciones</label><br>
                            <i class="fas fa-arrow-left" id="left"></i>
                            <i class="fas fa-arrow-up" id="up"></i>
                            <i class="fas fa-expand-arrows-alt" id="center"></i>
                            <i class="fas fa-arrow-down" id="down"></i>
                            <i class="fas fa-arrow-right" id="right"></i>
                            <i class="fas fa-arrows-alt-v" id="center_v"></i>
                            <i class="fas fa-arrows-alt-h" id="center_h"></i>
                        </div>

                        <div class="form-group mt-1 ml-1">
                            <label for="">Tamaño texto</label>
                            <select class="form-control form-control-sm" id="sizetext" disabled>
                            @foreach($textsize as $key => $value)
                                <option value="{{ $value ->size }}rem">{{ $value ->size }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-1 ml-1">
                            <label for="">Padding Left</label><br>
                            <select class="form-control form-control-sm" id="p-left" disabled>
                                <option value="pl-0">0</option>
                                <option value="pl-1">1</option>
                                <option value="pl-2">2</option>
                                <option value="pl-3">3</option>
                                <option value="pl-4">4</option>
                                <option value="pl-5">5</option>
                            </select>
                        </div>

                        <div class="form-group mt-1 ml-1">
                            <label for="">Padding Right</label><br>
                            <select class="form-control form-control-sm" id="p-right" disabled>
                                <option value="pr-0">0</option>
                                <option value="pr-1">1</option>
                                <option value="pr-2">2</option>
                                <option value="pr-3">3</option>
                                <option value="pr-4">4</option>
                                <option value="pr-5">5</option>
                            </select>
                        </div>

                    </div>
                    
                    <div class="row">
                        <!--Formulario que permite cambiar valores por defecto del template-->
                        <!--Creamos el template-->
                        <form action="/templates/save" method="post">
                        <section class="col-12">
                            <div class="row">
                                @foreach($images as $image)
                                    <div class="col-12">
                                        <div class="row ml-0 mr-0">
                                            @foreach($image['img'] as $key => $value)
                                            <div class="p-0 {{ $value['size'] }}">
                                                <div id="contenido" class="position-relative">
                                                    <img src="{{ $value['url'] }}" alt="" class="col-12 p-0">
                                                    <div class="overlay position-absolute">
                                                        <div class="container">
                                                            <div class="row align-items-center">
                                                                <div class="d-flex justify-content-center col-12">
                                                                    <div class="row">
                                                                        <p class="mb-0" id="{{ $value['description']['id'] }}">{{ $value['description']['value'] }}</p>
                                                                        
                                                                        <div class="form-group d-none" id="{{ $value['description']['id_input'] }}">
                                                                            <input type="{{ $value['description']['type'] }}" class="form-control" name="{{ $value['description']['name'] }}" value="{{ $value['description']['value'] }}">
                                                                        </div>
                                                                        <i class="fas fa-arrows-alt m-auto text-danger pl-2" 
                                                                        id="{{ $value['description']['id_icon'] }}"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                @endforeach
                            </div>
                        </section>
                        <button type="submit" class="btn btn-primary mt-1 ml-1">Guardar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!--
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>-->
<script src="{{ asset('js/controladorTexto.js') }}"></script>
@endsection
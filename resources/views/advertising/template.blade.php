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

                    <!--Aqui ponemos los checks-->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">fil\col</th>

                    @for($i=0; $i<$numCol; $i++)
                        <th scope="col" class="text-center">{{$i+1}}</th>
                    @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0; $i<$numFil; $i++)
                                <tr id='{{ $i+1 }}'>
                                <th scope="row">{{ $i+1 }}</th>
                                @for($j=0; $j<$numCol; $j++)
                                <td class="text-center">@if($j==0)<i class="fas fa-check text-success"></i>@else<i class="fas fa-times text-danger"></i>@endif</td>
                                @endfor
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                    <form action="/template" method="POST">
                        @for($i=1; $i<=$numFil; $i++)
                        <div class="form-group">
                        @csrf
                            <label for="filas{{ $i }}">Filas</label>
                            <input type="number" class="form-control" id="filas{{ $i }}" name="filas[]" value=1>
                        </div>
                        @endfor
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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
<script>
    function checkAndCross(id, col) {
        var j=0;
        var k=0;
        var l=0;
        if(col==0){
            j=1;
            k=2;
            l=3;
        }
        if(col==1){
            j=0;
            k=2;
            l=3;
        }
        if(col==2){
            j=0;
            k=1;
            l=3;
        }
        if(col==3){
            j=0;
            k=1;
            l=2;
        }
        $("#"+id+" td:nth("+col+")").click(function(){
            var icono=$(this).html();
            if(icono=='<i class="fas fa-times text-danger"></i>'){
                $(this).html('<i class="fas fa-check text-success"></i>');
                $("#"+id+" td:nth("+j+")").html('<i class="fas fa-times text-danger"></i>');
                $("#"+id+" td:nth("+k+")").html('<i class="fas fa-times text-danger"></i>');
                $("#"+id+" td:nth("+l+")").html('<i class="fas fa-times text-danger"></i>');
                $('#filas'+id).val(col+1);
            }
        });
    }
    checkAndCross(1,0);
    checkAndCross(1,1);
    checkAndCross(1,2);
    checkAndCross(1,3);
    checkAndCross(2,0);
    checkAndCross(2,1);
    checkAndCross(2,2);
    checkAndCross(2,3);

</script>
@endsection
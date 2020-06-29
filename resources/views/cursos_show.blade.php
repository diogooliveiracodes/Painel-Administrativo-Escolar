@extends('layouts.adminapp')

@section('content')

<div class="container text-white">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-card p-4">
                <div class="row justify-content-center">
                    <h4><strong>{{$curso->nome}}</strong></h4>
                </div>
                <hr style="border: 1px solid white">
                <div class="row justify-content-center">
                    <div class="col">
                        <label for="codigo">Código do Curso: </label>
                        <div class="label-control">
                            {{$curso->codigo}}
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center pt-2">

                    <form action="{{route('cursos.edit', ['curso'=> $curso->id])}}">
                        <button type="submit" class="btn btn-primary btn-md mx-2">Editar</button>
                    </form>
                    <form action="{{route('cursos.destroy', ['curso'=> $curso->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-md">Deletar</button>
                    </form>  
                </div>
                <div class="row mt-5 offset-sm-10 justify-content-right">
                    <div class="col-sm-2">
                        <a class="btn btn-lg btn-success" href="{{route('cursos.index')}}">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
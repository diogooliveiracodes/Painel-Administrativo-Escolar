@extends('layouts.adminapp')

@section('content')


<div class="container text-white">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card bg-card p-4">
                <div class="row justify-content-center">
                    <h4 class="col-sm-8">Cursos Cadastrados</h4>
                    <a class="btn btn-md btn-primary col-sm-4" href="{{route('cursos.create')}}">Novo Curso</a>
                </div>
                <hr style="border: 1px solid white">
                <div class="">
                    <div class="row justify-content-center">
                            {{ $cursos->onEachSide(1)->links() }}                        
                    </div>
                    <div class="table-responsive">
                        <table class="table-dark table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col-2">Código</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cursos as $curso)
                                <tr>
                                    <td>{{$curso->codigo}}</td>
                                    <td>
                                        <a class="text-white" href="{{route('cursos.show', ['curso' => $curso->id])}}"  style="text-decoration: none">
                                            {{$curso->nome}}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="col-sm-6">
                                            <a class="btn btn-primary btn-sm" href="{{route('cursos.show', ['curso' => $curso->id])}}">Consultar</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-5 offset-sm-10 justify-content-right">
                    <div class="col-sm-2">
                        <a class="btn btn-lg btn-success" href="{{route('home')}}">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.adminapp')

@section('content')


<div class="container text-white">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card bg-card p-4">
                <div class="row justify-content-center">
                    <h4 class="col-sm-8">Turmas Cadastradas</h4>
                    <a class="btn btn-md btn-primary col-sm-4" href="{{route('turmas.create')}}">Nova Turma</a>
                </div>
                <hr style="border: 1px solid white">
                <div class="">
                    <div class="row justify-content-center">
                            {{ $turmas->onEachSide(1)->links() }}                        
                    </div>
                    <div class="table-responsive">
                        <table class="table-dark table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col-2">Código</th>
                                    <th scope="col">Curso</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($turmas as $turma)
                                <tr>
                                    <td>{{$turma->codigo}}</td>
                                    <td>
                                        <a class="text-white" href="{{route('turmas.show', ['turma'=>$turma->id])}}"  style="text-decoration: none">
                                            {{$turma->curso->nome}}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="col-sm-6">
                                            <a class="btn btn-primary btn-sm" href="{{route('turmas.show', ['turma' => $turma->id])}}">Consultar</a>
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
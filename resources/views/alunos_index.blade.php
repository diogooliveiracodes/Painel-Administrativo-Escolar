@extends('layouts.adminapp')

@section('content')

<div class="container text-white my-4">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card bg-card p-4">
                <div class="row justify-content-center">
                        <h4 class="col-sm-8">Alunos Cadastrados</h4>                    
                        <a class="btn btn-md btn-primary col-sm-4" href="{{route('alunos.create')}}">Cadastrar Aluno</a>                    
                </div>
                <hr style="border: 1px solid white">
                <form action="{{route('alunos.find')}}" method="post">
                    @csrf
                    @method('post')
                    <div class="row justify-content-center">
                        <h4 class="col-sm-8">Pesquisar por Aluno </h4>   
                        <input type="text" class="form-control col-sm-2" placeholder="   Número da matrícula" name="matricula" id="matricula">
                        <button type="submit" class="btn btn-success col-sm-2 btn-sm">Pesquisar</button>
                    </div>
                </form>               
                <div class="row justify-content-center">
                    {{ $alunos->links() }}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-dark table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col-2">Matrícula</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($alunos as $aluno)
                                <tr>
                                    <td>{{$aluno->matricula}}</td>
                                    <td>
                                        <a class="text-white" href="{{route('alunos.show', ['aluno' => $aluno->id])}}" style="text-decoration: none">
                                            {{$aluno->nome}}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-white" href="{{route('alunos.show', ['aluno' => $aluno->id])}}" style="text-decoration: none">
                                            <button class="btn btn-primary btn-sm">Consultar</button>
                                        </a> 
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
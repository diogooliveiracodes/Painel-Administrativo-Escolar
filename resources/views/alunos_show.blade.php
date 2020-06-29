@extends('layouts.adminapp')

@section('content')
    
<div class="container text-white">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-card p-4">
                <div class="row justify-content-center">
                    <h4><strong>{{$aluno->nome}}</strong></h4>
                </div>
                <hr style="border: 1px solid white">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="row">
                            <img class="img-fluid rounded border" src="https://testedev-laravel-diogo.s3-sa-east-1.amazonaws.com{{$aluno->url}}" alt="">
                        </div>
                        <div class="row justify-content-center p-4">
                            
                                <form action="{{route('alunos.edit', ['aluno'=> $aluno->id])}}">
                                    <button type="submit" class="btn btn-primary btn-md mx-2">Editar</button>
                                </form>
                                <form action="{{route('alunos.destroy', ['aluno'=> $aluno->id])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-md">Deletar</button>
                                </form>                                                           
                        </div>
                    </div>
                    <div class="col-sm-8 mt-4">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="matricula">Matrícula:</label>
                                <div class="label-control">
                                    {{$aluno->matricula}}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="estado">Data de Matrícula: </label>
                                <div class="label-control">
                                    {{date_format($aluno->created_at,"d / m / Y")}}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="situacao">Situação:</label>
                            @if($aluno->situacao === 'ativo')
                                <div class="label-control" style="background-color: #38c172; color:white; border: 1px solid #38c172 ">
                                    {{$aluno->situacao}}
                                </div>
                            @else
                                <div class="label-control" style="background-color: #e3342f; color:white; border: 1px solid #e3342f">
                                    {{$aluno->situacao}}
                                </div>
                            @endif
                            </div>
                        </div>
                        <hr style="border: 1px solid white">
                        <div class="row">
                            <div class="col-sm-9">
                                <label for="logradouro">Logradouro:</label>
                                <div class="label-control">
                                    {{$aluno->logradouro}}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label for="numero">Número:</label>
                                <div class="label-control">
                                    {{$aluno->numero}}
                                </div>
                            </div>
                        </div>
                        <div class="row  mt-3">
                            <div class="col-sm-9">
                                <label for="bairro">Bairro:</label>
                                <div class="label-control">
                                    {{$aluno->bairro}}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label for="cep">CEP:</label>
                                <div class="label-control">
                                    {{$aluno->cep}}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-9">
                                <label for="cidade">Cidade:</label>
                                <div class="label-control">
                                    {{$aluno->cidade}}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label for="estado">Estado:</label>
                                <div class="label-control">
                                    {{$aluno->estado}}
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>       
                <hr style="border: 1px solid white"> 
                <div class="row justify-content-center">
                    <h4 class="text-white">Turmas:</h4>
                </div> 
                <div class="row">
                    <div class="table-responsive">
                        <table class="table-dark table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col-2">Código</th>
                                    <th scope="col">Curso</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($aluno->turmas as $turma)
                                <tr>
                                    <td>{{$turma->codigo}}</td>
                                    <td>
                                        <a class="text-white" href="{{route('turmas.show', ['turma'=>$turma->id])}}"  style="text-decoration: none">
                                            {{$turma->curso->nome}}
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
                        <a class="btn btn-lg btn-success" href="{{route('alunos.index')}}">Voltar</a>
                    </div>
                </div>          
            </div>
        </div>
    </div>
</div>

@endsection
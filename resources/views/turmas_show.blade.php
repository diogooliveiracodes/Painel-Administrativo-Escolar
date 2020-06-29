@extends('layouts.adminapp')

@section('content')

<div class="container text-white">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card bg-card p-4">
                <div class="row justify-content-center">
                    <h4><strong>{{$turma->nome}}</strong></h4>
                </div>
                <div class="row justify-content-center pt-2">

                    <form action="{{route('turmas.edit', ['turma'=> $turma->id])}}">
                        <button type="submit" class="btn btn-primary btn-md mx-2">Editar</button>
                    </form>
                    <form action="{{route('turmas.destroy', ['turma'=> $turma->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-md">Deletar</button>
                    </form>  
                </div>
                <hr style="border: 1px solid white">
                <div class="row justify-content-center">
                    <div class="col">
                        <label for="codigo">Código do Turma: </label>
                        <div class="label-control">
                            {{$turma->codigo}}
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col">
                        <label for="codigo">Curso: </label>
                        <div class="label-control">
                            {{$turma->curso->nome}}
                        </div>
                    </div>
                </div>
                <hr style="border:1px solid white">
                <div class="row justify-content-center pt-2">
                    <h4>Adicionar Alunos</h4>
                </div>
                
                <form action="{{route('turmas.addAluno', ['turma'=> $turma])}}" method="get">
                    @csrf
                    <div class="form-group row justify-content-center pt-2">
                        <label for="aluno_id" class="col-md-3 col-form-label text-md-right">{{ __('Matrícula do Aluno:') }}</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="aluno_id" name="aluno_id" required>
                        </div>
                        <button class="btn btn-primary btn-sm">Adicionar</button>
                    </div>
                </form>
                <hr style="border:1px solid white">

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
                            @foreach($turma->alunos as $aluno)
                            <tr>
                                <td>{{$aluno->matricula}}</td>
                                <td>
                                    <a class="text-white" href="{{route('alunos.show', ['aluno' => $aluno->id])}}" style="text-decoration: none">
                                        {{$aluno->nome}}
                                    </a>
                                </td>
                                <td>
                                        <form action="{{route('alunos.show', ['aluno'=> $aluno->id])}}">
                                            <button class="btn btn-primary btn-sm">Consultar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row mt-5 offset-sm-10 justify-content-right">
                    <div class="col-sm-2">
                        <a class="btn btn-lg btn-success" href="{{route('turmas.index')}}">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
@extends('layouts.adminapp')

@section('content')

<div class="row p-0 mx-0  text-white">

    <div class="col-sm-3">
        <div class="rounded p-4 m-2 bg-card">
            <div class="row justify-content-center">
                <h4 class="">Alunos cadastrados</h4>
            </div>
            <div class="row justify-content-center">
                <p style="font-size:3.5rem" class="text-white"><i class="fas fa-users"></i><strong> {{str_pad($alunos , 4 , '0' , STR_PAD_LEFT)}}</strong></p>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="rounded p-4 m-2 bg-card">
            <div class="row justify-content-center">
                <h4 class="">Alunos Ativos</h4>
            </div>
            <div class="row justify-content-center">
                <p style="font-size:3.5rem" class="text-white"><i class="fas fa-user-graduate"></i><strong> {{str_pad($ativos , 4 , '0' , STR_PAD_LEFT)}}</strong></p>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="rounded p-4 m-2 bg-card">
            <div class="row justify-content-center">
                <h4 class="">Alunos Inativos</h4>
            </div>
            <div class="row justify-content-center">
                <p style="font-size:3.5rem" class="text-white"><i class="fas fa-bed"></i><strong> {{str_pad($inativos , 4 , '0' , STR_PAD_LEFT)}}</strong></p>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
        <div class="rounded p-4 m-2 bg-card">
            <div class="row justify-content-center">
                <h4 class="">Cursos Cadastrados</h4>
            </div>
            <div class="row justify-content-center">
                <p style="font-size:3.5rem" class="text-white"><i class="fas fa-graduation-cap"></i><strong> {{str_pad($cursos , 4 , '0' , STR_PAD_LEFT)}}</strong></p>
            </div>
        </div>
    </div>

</div>

<div class="row p-0 m-0 text-white my-4">

    <div class="col-sm-6">
        <div class="rounded p-4 m-2 bg-card">
            <h5>Pesquisar por aluno</h5>
            <form action="{{route('alunos.find')}}" method="post">
            @csrf
            @method('post')
                <div class="form-group pt-2">
                    <input type="text" class="form-control" placeholder="Número da matrícula" name="matricula" id="matricula">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Pesquisar</button>
                </div>

            </form>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="rounded p-4 m-2 bg-card">
            <h5>Pesquisar por turma</h5>
            <form action="{{route('turmas.find')}}" method="post">
            @csrf
            @method('post')
                <div class="form-group pt-2">
                    <input type="text" class="form-control" placeholder="Código da turma" name="codigo" id="codigo" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Pesquisar</button>
                </div>

            </form>
        </div>
    </div>

</div>


@endsection

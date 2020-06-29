@extends('layouts.adminapp')

@section('content')

<div class="container text-white">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-card">
                
                
                <div class="row justify-content-center pt-3">
                    <h4>Editar Curso</h4>
                </div>
                <hr style="border:1px solid white">
                <div class="card-body">
                    <form method="POST" action="{{ route('cursos.update', ['curso' => $curso->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value="{{$curso->nome}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="codigo" class="col-md-4 col-form-label text-md-right">{{ __('Codigo') }}</label>

                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control" name="codigo" value="{{$curso->codigo}}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-lg btn-primary">
                                    {{ __('Confirmar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-5 offset-sm-10 justify-content-right">
                        <div class="col-sm-2">
                            <a class="btn btn-lg btn-success" href="{{route('cursos.show', ['curso' => $curso->id])}}">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
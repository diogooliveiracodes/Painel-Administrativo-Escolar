@extends('layouts.adminapp')

@section('content')


<div class="container text-white">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-card">
                
                
                <div class="row justify-content-center pt-3">
                    <h4>Cadastrar Turma</h4>
                </div>
                <hr style="border:1px solid white">
                <div class="card-body">
                    <form method="POST" action="{{ route('turmas.store') }}" enctype="multipart/form-data">
                        @csrf
                            
                            <div class="form-group row">
                                <label for="codigo" class="col-md-4 col-form-label text-md-right">{{ __('Código da Turma') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control-file" id="codigo" name="codigo" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="curso_id" class="col-md-4 col-form-label text-md-right">{{ __('Identificador do Curso') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control-file" id="curso_id" name="curso_id" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mt-3 mb-0 justify-content-center">
                            <button type="submit" class="btn btn-lg btn-primary mt-3">
                                {{ __('Cadastrar') }}
                            </button>
                        </div>
                    </form>
                    <div class="row mt-5 offset-sm-10 justify-content-right">
                        <div class="col-sm-2 p-4">
                            <a class="btn btn-lg btn-success" href="{{route('turmas.index')}}">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

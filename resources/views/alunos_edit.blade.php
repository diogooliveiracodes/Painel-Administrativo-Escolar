@extends('layouts.adminapp')

@section('content')

<!-- Adicionando JQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>


<script type="text/javascript" >

    $(document).ready(function() {
        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#logradouro").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#estado").val("");
        }
        
        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#logradouro").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#estado").val("...");
                    

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                        
                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#logradouro").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#estado").val(dados.uf);
                            
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });

</script>


<div class="container text-white">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-card">
                
                <div class="card-header">
                    <div class="row justify-content-center">
                        <h5>Cadastrar Aluno</h5>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('alunos.update', ['aluno' => $aluno->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input value="{{$aluno->nome}}" id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="name" autofocus>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="matricula" class="col-md-4 col-form-label text-md-right">{{ __('Matrícula') }}</label>

                            <div class="col-md-6">
                                <input value="{{$aluno->matricula}}" id="matricula" type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="{{ old('matricula') }}" required autocomplete="matricula" autofocus>

                                @error('matricula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cep" class="col-md-4 col-form-label text-md-right">{{ __('Situação') }}</label>

                            <div class="col-md-6">                                
                                <select name="situacao" id="situacao" class="form-control">
                                    <option value="ativo">Ativo</option>
                                    <option value="inativo">Inativo</option>
                                </select>
                                <small style="color:red">Verifique a situação do aluno</small>                            
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cep" class="col-md-4 col-form-label text-md-right">{{ __('CEP') }}</label>

                            <div class="col-md-6">                                
                                <input value="{{$aluno->cep}}" id="cep" type="text" maxlength="8" class="form-control" name="cep" required>                            
                            </div>
                        </div>

                        <div class="endereco">
                            <div class="form-group row">
                                <label for="logradouro" class="col-md-4 col-form-label text-md-right">{{ __('Logradouro') }}</label>
    
                                <div class="col-md-6">
                                    <input value="{{$aluno->logradouro}}" id="logradouro" type="text" class="form-control" name="logradouro" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cidade" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>
    
                                <div class="col-md-6">
                                    <input value="{{$aluno->cidade}}" id="cidade" type="text" class="form-control" name="cidade" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
    
                                <div class="col-md-6">
                                    <input value="{{$aluno->estado}}" id="estado" type="text" class="form-control" name="estado" required>
                                </div>
                            </div>                                                
                            <div class="form-group row">
                                <label for="bairro" class="col-md-4 col-form-label text-md-right">{{ __('Bairro') }}</label>
    
                                <div class="col-md-6">
                                    <input value="{{$aluno->bairro}}" id="bairro" type="text" class="form-control" name="bairro" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="numero" class="col-md-4 col-form-label text-md-right">{{ __('Numero') }}</label>
    
                                <div class="col-md-6">
                                    <input value="{{$aluno->numero}}" id="numero" type="text" class="form-control" name="numero" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="complemento" class="col-md-4 col-form-label text-md-right">{{ __('Complemento') }}</label>
    
                                <div class="col-md-6">
                                    <input value="{{$aluno->complemento}}" id="complemento" type="text" class="form-control" name="complemento" required>
                                </div>
                            </div>  
                            
                            <div class="form-group row">
                                <label for="arquivo" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" id="arquivo" name="arquivo">
                                </div>
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
                            <a class="btn btn-lg btn-success" href="{{route('alunos.show', ['aluno' => $aluno->id])}}">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
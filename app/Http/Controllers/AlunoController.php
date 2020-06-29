<?php

namespace App\Http\Controllers;

use App\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller
{

    public function find(Request $request)
    {
        $validatedData = $request->validate([
            'matricula' => 'exists:App\Aluno,matricula',
        ]);
        $aluno = Aluno::where('matricula', '=', $request->matricula)->first();
        return redirect(route('alunos.show', ['aluno' => $aluno->id ]));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::paginate(2);
        return view ('alunos_index', [
            'alunos' => $alunos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('alunos_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'matricula' => 'required|unique:alunos',
        ]);

        $path = $request->file('arquivo')->store('public', 's3');
        Storage::disk('s3')->setVisibility($path, 'public');

        $aluno = new Aluno();
        $aluno->nome = $request->nome;
        $aluno->matricula = $request->matricula;
        $aluno->situacao = $request->situacao;
        $aluno->cep = $request->cep;
        $aluno->logradouro = $request->logradouro;
        $aluno->cidade = $request->cidade;
        $aluno->estado = $request->estado;
        $aluno->bairro = $request->bairro;
        $aluno->numero = $request->numero;
        $aluno->complemento = $request->complemento;
        $aluno->filename = $path;
        $aluno->url = Storage::disk('s3')->url($path);
        $aluno->save();
        return redirect(route('alunos.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        return view ('alunos_show', [
            'aluno' => $aluno,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {
        return view ('alunos_edit', [
            'aluno' => $aluno
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aluno $aluno)
    {
        if ($request->arquivo != null){
            Storage::disk('s3')->delete($aluno->filename);
            $path = $request->file('arquivo')->store('imagens', 's3');
            Storage::disk('s3')->setVisibility($path, 'public');

            $aluno->url = Storage::disk('s3')->url($path);
            $aluno->filename = $path;
        }
        $aluno->nome = $request->nome;
        $aluno->matricula = $request->matricula;
        $aluno->situacao = $request->situacao;
        $aluno->cep = $request->cep;
        $aluno->logradouro = $request->logradouro;
        $aluno->cidade = $request->cidade;
        $aluno->estado = $request->estado;
        $aluno->bairro = $request->bairro;
        $aluno->numero = $request->numero;
        $aluno->complemento = $request->complemento;
        $aluno->save();
        return redirect(route('alunos.show', ['aluno' => $aluno->id]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        Storage::disk('s3')->delete($aluno->filename);
        $aluno->delete();
        return redirect(route('alunos.index'));

    }
}

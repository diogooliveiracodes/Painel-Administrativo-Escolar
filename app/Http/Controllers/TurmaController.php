<?php

namespace App\Http\Controllers;

use App\Turma;
use App\Aluno;
use App\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TurmaController extends Controller
{
    public function find(Request $request)
    {
        $validatedData = $request->validate([
            'codigo' => 'exists:App\Turma,codigo',
        ]);
        $turma = Turma::where('codigo', '=', $request->codigo)->first();
        return redirect(route('turmas.show', ['turma' => $turma->id ]));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turmas = Turma::paginate(5);
        return view('turmas_index', [
            'turmas' => $turmas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('turmas_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacao_turma = Turma::where('codigo', $request->codigo)->get();
        $validacao_curso = Curso::where('id', $request->curso_id )->get();
        if($validacao_turma->count() < 1 and $validacao_curso->count() === 1){
            $turma = new Turma();
            $turma->codigo = $request->codigo;
            $turma->curso_id = $request->curso_id;
            $turma->save();
        }
        return redirect(route('turmas.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function show(Turma $turma)
    {
        
        return view ('turmas_show', [
            'turma' => $turma,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function edit(Turma $turma)
    {

        return view ('turmas_edit', [
            'turma' => $turma
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turma $turma)
    {
        $validacao_turma = Turma::where('codigo', $request->codigo)->get();
        $validacao_curso = Curso::where('id', $request->curso_id )->get();

        if($turma->codigo == $request->codigo and $validacao_curso->count() === 1){
            $turma->codigo = $request->codigo;
            $turma->curso_id = $request->curso_id;
            $turma->save();
        }

        if($validacao_turma->count() < 1 and $validacao_curso->count() === 1){
            $turma->codigo = $request->codigo;
            $turma->curso_id = $request->curso_id;
            $turma->save();
        }
        return redirect(route('turmas.show', ['turma' => $turma->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turma $turma)
    {
        $turma->delete();
        return redirect(route('turmas.index'));
    }

    public function addAluno(Turma $turma, Request $request)
    {

        $aluno = Aluno::where('matricula', $request->aluno_id)->first();

        if (!$aluno){
            return redirect(route('turmas.show', ['turma' => $turma->id]));
        }

        $validacao = DB::table('aluno_turma')
            ->where('turma_id', '=', $turma->id)
            ->where('aluno_id', '=', $aluno->id)
            ->first();

        if(!$validacao){
            DB::table('aluno_turma')->insertOrIgnore([
                ['aluno_id' => $aluno->id, 'turma_id' => $turma->id],
            ]);
            
            return redirect(route('turmas.show', ['turma' => $turma->id]));
        } else{
            
            return redirect(route('turmas.show', ['turma' => $turma->id]));
        }


    }
}

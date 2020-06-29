<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\Curso;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cursos = Curso::all();
        $cursos_cadastrados = count($cursos);

        $alunos = Aluno::all();
        $alunos_ativos = Aluno::where('situacao', '=', 'ativo')->get();
        $alunos_inativos= Aluno::where('situacao', '=', 'inativo')->get();
        $numero_alunos = count($alunos);
        $numero_alunos_ativos = count($alunos_ativos);
        $numero_alunos_inativos = count($alunos_inativos);

        return view('home',[
            'alunos' => $numero_alunos,
            'ativos' => $numero_alunos_ativos,
            'inativos' => $numero_alunos_inativos,
            'cursos' => $cursos_cadastrados,
        ]);
    }
}

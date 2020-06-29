<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\SimpleXMLElement;

class CursoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::paginate(10);
        return view('cursos_index',[
            'cursos' => $cursos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('cursos_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $path = $request->file('arquivo')->store('public', 's3');
        Storage::disk('s3')->setVisibility($path, 'public');
        
        $link = "https://testedev-laravel-diogo.s3-sa-east-1.amazonaws.com/{$path}"; 
        //link do arquivo xml
        $xml = simplexml_load_file($link);
        // return dd($xml);
        //carrega o arquivo XML e retornando um Array
        foreach($xml->curso as $item){
            $curso = new Curso();
            $curso->nome = $item->nome;
            $curso->codigo = $item->codigo;
            $curso->save();
        }
        return redirect(route('cursos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        return view ('cursos_show',[
            'curso' => $curso,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        return view ('cursos_edit', [
            'curso' => $curso,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        $curso->nome = $request->nome;
        $curso->codigo = $request->codigo;
        $curso->save();
        return redirect (route('cursos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect(route('cursos.index'));
    }
}

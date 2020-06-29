<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Curso;

class Turma extends Model
{

    protected $fillable = [
        'codigo', 'curso_id', 'id', 'created_at', 'aluno', 'alunos'
    ];


    public function curso()
    {
        return $this->belongsTo('App\Curso');
    }

    public function alunos()
    {
        return $this->belongsToMany('App\Aluno');
    }
}

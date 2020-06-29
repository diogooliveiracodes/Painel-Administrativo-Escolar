<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'id', 'nome', 'matricula',
    ];

    public function turmas()
    {
        return $this->belongsToMany('App\Turma');
    }
}

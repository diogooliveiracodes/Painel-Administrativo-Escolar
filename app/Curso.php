<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    public function turmas()
    {
        return $this->hasMany('App\Turma');
    }
}

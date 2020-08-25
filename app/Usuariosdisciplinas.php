<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuariosdisciplinas extends Model
{
    protected $fillable = [
        'idUsuario', 'idDisciplina',
    ];

    public function usuarios() {
        return $this->hasMany('App\Usuario');
    }

    public function disciplinas() {
        return $this->hasMany('App\Disciplina');
    }
}

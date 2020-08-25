<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $fillable = [
        'featured', 'idDisciplina', 'nomeProjeto',
    ];

    public function disciplinas() {
        return $this->belongsTo('App\Disciplina');
    }
}

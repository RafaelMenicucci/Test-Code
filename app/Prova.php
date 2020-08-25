<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prova extends Model
{
    protected $fillable = [
        'featured', 'idProjeto', 'nomeProva','dataLimite',
    ];

    public function disciplinas() {
        return $this->belongsTo('App\Projeto');
    }
}

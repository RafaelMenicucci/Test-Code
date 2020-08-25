<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    protected $fillable = [
        'featured', 'idProva', 'nota','idAluno',
    ];

    public function disciplinas() {
        return $this->belongsTo('App\Prova');
    }
}

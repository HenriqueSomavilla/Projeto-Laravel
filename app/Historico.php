<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    protected $fillable = [
        'data',
        'hora'
    ];

    public function historico_habitos(){
        return $this->hasMany('App\HistoricoHabitos');
    }
}

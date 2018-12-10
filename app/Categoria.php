<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nome', 'descricao']; 

    public function habito(){
        return $this->hasMany('App\Alimento');
        
    }

}

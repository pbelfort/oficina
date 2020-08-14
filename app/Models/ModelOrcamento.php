<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelOrcamento extends Model
{
   protected $table = 'orcamento';
   protected $fillable = ['cliente','data','descricao','valor','id_user'];

    public function relUsers(){
        return $this->hasOne('App\User','id','id_user');
    }
}

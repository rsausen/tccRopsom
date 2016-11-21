<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Controle_Horario extends Model
{
    //
    protected $table="controle_horario";
    protected $fillable=["funcionario_id","entrada","saida","dataEntrada","dataSaida"];
  
    public function funcionario(){
    	return $this->belongsTo('App\Funcionario', 'funcionario_id');
    }
}

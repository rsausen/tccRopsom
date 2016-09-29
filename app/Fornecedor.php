<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    //
    protected $table="fornecedor";
    protected $fillable=["nome","cnpj","telefone","email","site","endereco","cidade_id"];

    public function notas(){
    	return $this->hasMany('App\Forncedor');
    }

    public function cidade() {
  		return $this->belongsTo('App\Cidade', 'cidade_id');
    }
}

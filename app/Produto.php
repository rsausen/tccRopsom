<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //
    protected $table="produto";
    protected $fillable=["nome"];

    public function itens(){
    	return $this->hasOne('App\Item_Nota');
    } 

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    //
    protected $table="nota";
    protected $fillable=["item_id","total","data","fornecedor_id","pdfnota"];

    public function fornecedor(){
    	return $this->belongsTo('App\Fornecedor');
    }

    public function itens(){
        return $this->hasMany('App\Item_Nota');
    }
}

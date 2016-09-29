<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_Nota extends Model
{
    //
    protected $table="item_nota";
    protected $fillable=["produto_id","nota_id","preco","quantidade"];

    public function produtos(){
        return $this->belongsTo('App\Produto','produto_id');
    }

    public function nota(){
        return $this->belongsTo('App\Nota','nota_id');
    }
}

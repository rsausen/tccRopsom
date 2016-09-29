<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidades';
    protected $fillable = ['id','nome','id_estado'];

    public function estado() {
    	return $this->belongsTo('App\Estado', 'id_estado');
    }
}

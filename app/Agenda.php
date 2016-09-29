<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    //
    protected $table="agenda";
    protected $fillable=["nome","descricao","data","hora"];
}

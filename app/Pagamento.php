<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    //
    protected $table="pagamento";
    protected $fillable=["nome","vencimento","valor","pago"];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $fillable = [ 
        'quantidade',
        'comanda_id',
        'prato_id',
    ];
    public function comanda()
    {
        return $this->belongsTo(Comanda::class, 'comanda_id');
    }

    public function prato()
    {
        return $this->belongsTo(Prato::class, 'prato_id');
    }


    use HasFactory;

}

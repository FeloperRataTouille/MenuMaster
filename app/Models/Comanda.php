<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemDoPedido;

class Comanda extends Model
{

    protected $fillable = [
        'status',
    ];

    public function itensDoPedido(){
        return $this->hasMany(ItemDoPedido::class);
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'comanda_id');
    }
    use HasFactory;
}

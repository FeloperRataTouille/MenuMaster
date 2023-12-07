<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function store(Request $request){
        $data = [
            'quantidade' => $request->input('quantidade'),
            'prato_id' => $request->input('prato_id'),
            'comanda_id' => $request->input('comanda_id'),
            'observacao' => $request->input('observacao'),
        ];

        Pedido::create($data);
        $request->session()->put('comandaAtiva', true);
        return redirect('cardapio');
    }

    public function show(){
        $pedidos = Pedido::all();
        return view('pedidos', ['pedidos' => $pedidos]);
    }
}

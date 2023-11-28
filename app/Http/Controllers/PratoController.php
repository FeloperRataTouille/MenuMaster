<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prato;

class PratoController extends Controller
{
    public function index(){
        return view('prato');
    }

    public function store(Request $request){
        $data = [
            'nome' => $request->input('nome'),
            'preco' => $request->input('preco'),
            'tipo' => $request->input('tipo'),
        ];

        Prato::create($data);
        return view('index');
    }

    public function show(){
        $pratos = Prato::all();
        return view('cardapio', ['pratos' => $pratos]);
    }
}

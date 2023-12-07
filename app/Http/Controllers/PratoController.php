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

    public function update(Request $request, $id)
{
    $prato = Prato::find($id);

    if (!$prato) {
        return redirect()->back()->with('error', 'Prato não encontrado.');
    }

    $prato->nome = $request->input('nome');
    $prato->preco = $request->input('preco');
    $prato->tipo = $request->input('tipo');
    $prato->save();

    return redirect()->route('prato.index')->with('success', 'Prato atualizado com sucesso.');
}

public function delete($id)
{
    $prato = Prato::find($id);

    if (!$prato) {
        return redirect()->back()->with('error', 'Prato não encontrado.');
    }

    $prato->delete();

    return redirect()->route('prato.index')->with('success', 'Prato deletado com sucesso.');
}
}

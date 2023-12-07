<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comanda;
use App\Models\Prato;
use Illuminate\Support\Facades\Session;

class ComandaController extends Controller
{
    public function index(){
        return view('index');
    }

    public function store(Request $request) {
        $status = 1;
        $data = [
            'status' => $status,
        ];
        $pratos = Prato::all();
        $comanda = Comanda::create($data);
        $comandaId = $comanda->id;
    
        // Armazenar apenas o ID da comanda na sessão
        Session::put('comanda_id', $comandaId, );
    
        return view('cardapio', ['pratos' => $pratos]);
    }
    
    public function update(Request $request)
{
    // Verifique se há uma comanda ativa na sessão
    if ($request->session()->has('comanda_id')) {
        $comandaId = $request->session()->get('comanda_id');

        // Encontre a comanda com base no ID da sessão
        $comanda = Comanda::find($comandaId);

        if ($comanda) {
            // Atualize o status da comanda para encerrada (por exemplo, status 0)
            $comanda->status = 0;
            $comanda->save();

            // Redirecione ou retorne a resposta apropriada
            return redirect('/')->with('success', 'Comanda encerrada com sucesso!');
        }
    }

    // Se a comanda não for encontrada ou não houver comanda ativa na sessão
    return redirect('/')->with('error', 'Nenhuma comanda ativa encontrada para encerrar.');
}
    public function delete(){
        Session::forget('comanda_id');
        return redirect ('index');
    }

    public function show(){
        $comandas = Comanda::all();
        return view('adm.comandas', ['comandas' => $comandas]);
    }
}

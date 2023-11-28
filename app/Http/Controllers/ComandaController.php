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

    public function store(Request $request){
        Session::start();
        $status = 1;
        $data = [
            'status' => $status,
        ];

        $comanda = Comanda::create($data);
        $comandaId = $comanda->id;
        Session::put('comanda_id', $comandaId);
        return redirect('cardapio');
    }

    public function delete(){
        Session::forget('comanda_id');
        return redirect ('index');
    }
}

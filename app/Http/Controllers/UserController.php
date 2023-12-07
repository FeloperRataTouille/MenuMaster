<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index(){
        return view('auth.register');
    }
    public function register(Request $request){
        $data = [
            'usuario' => $request->input('usuario'),
            'senha' => $request->input('senha'),
        ];
        User::create($data);
        return redirect('/');
    }
}

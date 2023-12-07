<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('usuario', 'senha');

        if (Auth::attempt($credentials)) {
            // Autenticação bem-sucedida, redireciona para página de destino
            return redirect()->intended('/');
        }

        // Autenticação falhou, redireciona de volta com uma mensagem de erro
        return redirect()->back()->withInput()->withErrors(['message' => 'Credenciais inválidas']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

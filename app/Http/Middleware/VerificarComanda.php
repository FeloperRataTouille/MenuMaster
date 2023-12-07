<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarComanda
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
{
    // Verifique se há uma comanda ativa na sessão
    if ($request->session()->has('comandaAtiva')) {
        // Se a comanda estiver ativa, permita o acesso à rota
        return $next($request);
    }

    // Se não houver comanda ativa, redirecione para a página inicial
    \Log::info('Nenhuma comanda ativa encontrada na sessão.');
    return redirect('/');
}

}

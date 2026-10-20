<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Libera a rota apenas para quem está logado como ADMIN.
 * Usada, por exemplo, no cadastro de funcionários.
 */
class EnsureAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session('nivel_acesso') !== 'ADMIN') {
            return redirect()
                ->route('login.funcionario')
                ->with('erro', 'Área restrita ao administrador do sistema.');
        }

        return $next($request);
    }
}

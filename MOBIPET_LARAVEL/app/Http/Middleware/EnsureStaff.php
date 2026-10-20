<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Libera a rota para funcionários e administradores (equipe interna).
 */
class EnsureStaff
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!in_array(session('nivel_acesso'), ['FUNCIONARIO', 'ADMIN'], true)) {
            return redirect()
                ->route('login.funcionario')
                ->with('erro', 'Faça login como membro da equipe para acessar esta área.');
        }

        return $next($request);
    }
}

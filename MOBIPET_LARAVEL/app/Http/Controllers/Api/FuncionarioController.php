<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    /**
     * Lista enxuta (sem CPF/salário/endereço) só para o cliente escolher
     * o profissional na hora de agendar.
     */
    public function index()
    {
        return response()->json(
            Funcionario::select('id_funcionario', 'nome', 'cargo')->orderBy('nome')->get()
        );
    }
}

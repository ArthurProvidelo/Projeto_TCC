<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Servico;

class ServicoController extends Controller
{
    public function index()
    {
        return response()->json(Servico::with('servicoEtapas')->orderBy('nome')->get());
    }
}

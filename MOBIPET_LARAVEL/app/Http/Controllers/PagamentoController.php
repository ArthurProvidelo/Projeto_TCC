<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagamentoController extends Controller
{
    // Listar pagamentos
    public function index()
    {
        $pagamentos = DB::table('pagamento')->get();
        return view('pagamentos.index', compact('pagamentos'));
    }

    // Formulário de criação
    public function create()
    {
        return view('pagamentos.create');
    }

    // Salvar novo pagamento
    public function store(Request $request)
    {
        $request->validate([
            'valor' => 'required|numeric',
            'forma_pagamento' => 'required|string|max:255',
            'data_pagamento' => 'required|date',
        ]);

        DB::table('pagamento')->insert([
            'valor' => $request->valor,
            'forma_pagamento' => $request->forma_pagamento,
            'data_pagamento' => $request->data_pagamento,
        ]);

        return redirect()->route('pagamentos.index')
        ->with('success', 'Pagamento registrado com sucesso!');
    }

    // Visualizar pagamento
    public function show($id)
    {
        $pagamento = DB::table('pagamento')
            ->where('id_pagamento', $id)
            ->first();

        return view('pagamentos.show', compact('pagamento'));
    }

    // Formulário de edição
    public function edit($id)
    {
        $pagamento = DB::table('pagamento')
            ->where('id_pagamento', $id)
            ->first();

        return view('pagamentos.edit', compact('pagamento'));
    }

    // Atualizar pagamento
    public function update(Request $request, $id)
    {
        $request->validate([
            'valor' => 'required|numeric',
            'forma_pagamento' => 'required|string|max:255',
            'data_pagamento' => 'required|date',
        ]);

        DB::table('pagamento')
            ->where('id_pagamento', $id)
            ->update([
                'valor' => $request->valor,
                'forma_pagamento' => $request->forma_pagamento,
                'data_pagamento' => $request->data_pagamento,
            ]);

        return redirect()->route('pagamentos.index')
                         ->with('success', 'Pagamento atualizado com sucesso!');
    }

    // Excluir pagamento
    public function destroy($id)
    {
        DB::table('pagamento')
            ->where('id_pagamento', $id)
            ->delete();

        return redirect()->route('pagamentos.index')
        ->with('success', 'Pagamento excluído com sucesso!');
    }
}
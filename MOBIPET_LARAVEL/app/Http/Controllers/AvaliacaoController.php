<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvaliacaoController extends Controller
{
    // Listar avaliações
    public function index()
    {
        $avaliacoes = DB::table('avaliacoes')->get();
        return view('avaliacoes.index', compact('avaliacoes'));
    }

    // Formulário de criação
    public function create()
    {
        $agendamentos = DB::table('agendamentos')->get();
        return view('avaliacoes.create', compact('agendamentos'));
    }

    // Salvar nova avaliação
    public function store(Request $request)
    {
        $request->validate([
            'nota' => 'required|integer|min:1|max:5',
            'comentario' => 'nullable|string',
            'data_avaliacao' => 'required|date',
            'fk_id_agendamento' => 'required|integer',
        ]);

        DB::table('avaliacoes')->insert([
            'nota' => $request->nota,
            'comentario' => $request->comentario,
            'data_avaliacao' => $request->data_avaliacao,
            'fk_id_agendamento' => $request->fk_id_agendamento,
        ]);

        return redirect()->route('avaliacoes.index')
         ->with('success', 'Avaliação cadastrada com sucesso!');
    }

    // Visualizar avaliação
    public function show($id)
    {
        $avaliacao = DB::table('avaliacoes')
            ->where('id', $id)
            ->first();

        return view('avaliacoes.show', compact('avaliacao'));
    }

    // Formulário de edição
    public function edit($id)
    {
        $avaliacao = DB::table('avaliacoes')
            ->where('id', $id)
            ->first();

        $agendamentos = DB::table('agendamentos')->get();

        return view('avaliacoes.edit', compact('avaliacao', 'agendamentos'));
    }

    // Atualizar avaliação
    public function update(Request $request, $id)
    {
        $request->validate([
            'nota' => 'required|integer|min:1|max:5',
            'comentario' => 'nullable|string',
            'data_avaliacao' => 'required|date',
            'fk_id_agendamento' => 'required|integer',
        ]);

        DB::table('avaliacoes')
            ->where('id', $id)
            ->update([
                'nota' => $request->nota,
                'comentario' => $request->comentario,
                'data_avaliacao' => $request->data_avaliacao,
                'fk_id_agendamento' => $request->fk_id_agendamento,
            ]);

        return redirect()->route('avaliacoes.index')
        ->with('success', 'Avaliação atualizada com sucesso!');
    }

    // Excluir avaliação
    public function destroy($id)
    {
        DB::table('avaliacoes')
            ->where('id', $id)
            ->delete();

        return redirect()->route('avaliacoes.index')
        ->with('success', 'Avaliação excluída com sucesso!');
    }
}
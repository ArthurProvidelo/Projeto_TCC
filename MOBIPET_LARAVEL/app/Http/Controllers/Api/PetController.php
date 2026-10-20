<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agendamento;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(
            $request->user()->pets()->orderBy('nome')->get()
        );
    }

    public function store(Request $request)
    {
        $dados = $this->validarDados($request);

        $pet = $request->user()->pets()->create([
            ...$dados,
            'status' => 'Aguardando atendimento',
        ]);

        return response()->json($pet, 201);
    }

    public function show(Request $request, int $id)
    {
        return response()->json($this->petDoCliente($request, $id));
    }

    public function update(Request $request, int $id)
    {
        $pet = $this->petDoCliente($request, $id);
        $pet->update($this->validarDados($request));

        return response()->json($pet);
    }

    public function destroy(Request $request, int $id)
    {
        $this->petDoCliente($request, $id)->delete();

        return response()->json(null, 204);
    }

    public function atendimentoAtual(Request $request, int $id)
    {
        $pet = $this->petDoCliente($request, $id);

        $agendamento = Agendamento::where('fk_id_pet', $pet->id_pet)
            ->where('status_agendamento', 'Em atendimento')
            ->with(['servico.servicoEtapas', 'funcionario'])
            ->latest('id_agendamento')
            ->first();

        return response()->json(['agendamento' => $agendamento?->comEsteira()]);
    }

    private function validarDados(Request $request): array
    {
        return $request->validate([
            'nome' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'raca' => 'required|string|max:255',
            'porte' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
        ]);
    }

    private function petDoCliente(Request $request, int $id): Pet
    {
        $pet = $request->user()->pets()->where('id_pet', $id)->first();

        abort_if(!$pet, 404, 'Pet não encontrado.');

        return $pet;
    }
}

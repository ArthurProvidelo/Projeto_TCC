<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cartao;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CartaoController extends Controller
{
    /**
     * Rota pública (sem token) para o sketch de cadastro do ESP32: recebe
     * {"uid": "...", "pet_id": 33} e vincula o UID do cartão ao pet.
     *
     * Se o UID já estiver cadastrado, o vínculo é atualizado para o novo
     * pet (recadastro de um cartão em branco reaproveitado).
     */
    public function store(Request $request)
    {
        try {
            $dados = $request->validate([
                'uid' => 'required|string|max:64',
                'pet_id' => 'required|integer|exists:Pet,id_pet',
            ], [
                'uid.required' => 'Informe o uid do cartão.',
                'pet_id.required' => 'Informe o pet_id.',
                'pet_id.exists' => 'Pet não encontrado.',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'mensagem' => collect($e->errors())->flatten()->first(),
            ], 422);
        }

        $uid = trim($dados['uid']);
        $recadastro = Cartao::where('uid', $uid)->exists();

        $cartao = Cartao::updateOrCreate(
            ['uid' => $uid],
            ['fk_id_pet' => $dados['pet_id']]
        )->load('pet');

        return response()->json([
            'success' => true,
            'mensagem' => $recadastro
                ? "Cartao recadastrado para o pet {$cartao->pet->nome}."
                : "Cartao vinculado ao pet {$cartao->pet->nome}.",
            'uid' => $cartao->uid,
            'pet_id' => $cartao->fk_id_pet,
        ], $recadastro ? 200 : 201);
    }
}

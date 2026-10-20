<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

/**
 * Autenticação por token (Sanctum) do app mobile. Independente do login por
 * sessão usado pelo sistema web (App\Http\Controllers\AuthController).
 */
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->merge([
            'cpf' => preg_replace('/\D/', '', (string) $request->cpf),
            'telefone' => preg_replace('/\D/', '', (string) $request->telefone),
        ]);
        $this->normalizarCep($request);

        $dados = $request->validate([
            'cep' => 'nullable|digits:8',
            'nome' => 'required|string|max:255',
            'cpf' => 'required|digits:11|unique:Cliente,cpf',
            'telefone' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:Cliente,email',
            'senha' => 'required|string|min:6|max:255',
            'endereco' => 'required|string|max:255',
        ]);

        $cliente = Cliente::create([
            'nome' => $dados['nome'],
            'cpf' => $dados['cpf'],
            'telefone' => $dados['telefone'],
            'email' => $dados['email'],
            'senha' => Hash::make($dados['senha']),
            'endereco' => $dados['endereco'],
            'cep' => $dados['cep'] ?? null,
        ]);

        return response()->json([
            'cliente' => $cliente,
            'token' => $cliente->createToken('mobile')->plainTextToken,
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required|string',
        ]);

        $cliente = Cliente::where('email', $request->email)->first();

        if (!$cliente || !Hash::check($request->senha, $cliente->senha)) {
            return response()->json([
                'message' => 'E-mail ou senha inválidos.',
            ], 401);
        }

        return response()->json([
            'cliente' => $cliente,
            'token' => $cliente->createToken('mobile')->plainTextToken,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Sessão encerrada.']);
    }

    public function me(Request $request)
    {
        return response()->json(['cliente' => $request->user()]);
    }

    public function updateProfile(Request $request)
    {
        $cliente = $request->user();
        $this->normalizarCep($request);

        $dados = $request->validate([
            'cep' => 'nullable|digits:8',
            'nome' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('Cliente', 'email')->ignore($cliente->id_cliente, 'id_cliente'),
            ],
            'telefone' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
        ]);

        $cliente->update($dados);

        return response()->json(['cliente' => $cliente]);
    }

    public function changePassword(Request $request)
    {
        $cliente = $request->user();

        $dados = $request->validate([
            'senha_atual' => 'required|string',
            'nova_senha' => 'required|string|min:6|max:255',
        ]);

        if (!Hash::check($dados['senha_atual'], $cliente->senha)) {
            return response()->json(['message' => 'Senha atual incorreta.'], 422);
        }

        $cliente->update(['senha' => Hash::make($dados['nova_senha'])]);

        return response()->json(['message' => 'Senha alterada com sucesso.']);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Sem provedor de e-mail configurado no .env ainda: por enquanto só
        // confirma o recebimento, sem revelar se o e-mail existe na base.
        return response()->json([
            'message' => 'Se o e-mail existir em nossa base, enviaremos as instruções.',
        ]);
    }

    /**
     * CEP é opcional no app: só normaliza (tira a máscara) quando ele vem na
     * requisição, para uma atualização de perfil sem o campo não apagar o
     * CEP já salvo.
     */
    private function normalizarCep(Request $request): void
    {
        if ($request->has('cep')) {
            $request->merge([
                'cep' => preg_replace('/\D/', '', (string) $request->cep) ?: null,
            ]);
        }
    }
}

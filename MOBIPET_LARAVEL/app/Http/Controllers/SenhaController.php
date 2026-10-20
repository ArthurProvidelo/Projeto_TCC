<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SenhaController extends Controller
{
    /**
     * Chave de sessão que marca um cliente que já teve o e-mail + CPF
     * conferidos e, portanto, está autorizado a criar uma nova senha.
     */
    private const SESSAO_CLIENTE = 'senha_recuperar_cliente_id';

    /**
     * Tela onde o cliente informa o e-mail e o CPF cadastrados.
     */
    public function formularioRecuperar()
    {
        return view('auth.recuperar-senha');
    }

    /**
     * Confere se o e-mail e o CPF informados pertencem ao mesmo cliente.
     * Batendo os dois, guarda o id na sessão e leva para a tela de nova senha;
     * caso contrário volta com um erro para a tela.
     */
    public function verificarIdentidade(Request $request)
    {
        $dados = $request->validate([
            'email' => 'required|email',
            'cpf'   => 'required|string',
        ], [], [
            'cpf' => 'CPF',
        ]);

        // Compara o CPF apenas pelos dígitos, aceitando com ou sem máscara
        // dos dois lados (entrada do usuário e valor gravado no banco).
        $cpfDigitos = preg_replace('/\D/', '', $dados['cpf']);

        $cliente = DB::table('cliente')
            ->where('email', $dados['email'])
            ->whereRaw("REPLACE(REPLACE(REPLACE(cpf, '.', ''), '-', ''), ' ', '') = ?", [$cpfDigitos])
            ->first();

        if (!$cliente) {
            return back()
                ->withInput()
                ->withErrors(['email' => 'E-mail e CPF não conferem com nenhum cadastro.']);
        }

        $request->session()->put(self::SESSAO_CLIENTE, $cliente->id_cliente);

        return redirect()->route('senha.redefinir');
    }

    /**
     * Tela para criar a nova senha. Só abre depois da conferência de
     * e-mail + CPF (id do cliente guardado na sessão).
     */
    public function formulario(Request $request)
    {
        if (!$request->session()->has(self::SESSAO_CLIENTE)) {
            return redirect()
                ->route('senha.recuperar')
                ->withErrors(['email' => 'Confirme seu e-mail e CPF antes de criar uma nova senha.']);
        }

        return view('auth.redefinir-senha');
    }

    /**
     * Grava a nova senha do cliente que passou pela conferência.
     */
    public function atualizar(Request $request)
    {
        $idCliente = $request->session()->get(self::SESSAO_CLIENTE);

        if (!$idCliente) {
            return redirect()
                ->route('senha.recuperar')
                ->withErrors(['email' => 'Sua sessão expirou. Confirme seu e-mail e CPF novamente.']);
        }

        $request->validate([
            'senha' => 'required|string|min:6|confirmed',
        ]);

        DB::table('cliente')
            ->where('id_cliente', $idCliente)
            ->update(['senha' => Hash::make($request->senha)]);

        $request->session()->forget(self::SESSAO_CLIENTE);

        return redirect()
            ->route('login')
            ->with('sucesso', 'Sua senha foi redefinida com sucesso! Faça login com a nova senha.');
    }
}

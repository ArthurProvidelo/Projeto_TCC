<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // Exibe a tela de cadastro
    public function exibirCadastro()
    {
        return view('auth.cadastro');
    }

    // Processa o cadastro
    public function salvarCadastro(Request $request)
    {
        // Remove máscara do CPF e do telefone
        $cpf = preg_replace('/[^0-9]/', '', $request->cpf);
        $telefone = preg_replace('/[^0-9]/', '', $request->telefone);

        // Atualiza o valor do request
        $request->merge([
            'cpf'      => $cpf,
            'telefone' => $telefone,
            'cep'      => preg_replace('/[^0-9]/', '', (string) $request->cep) ?: null,
        ]);

        // Validação
        $request->validate([
            'nome'     => 'required|string|max:255',
            'cpf'      => 'required|digits:11',
            'telefone' => 'required|digits_between:10,11',
            'email'    => 'required|email|max:255',
            'senha'    => 'required|min:6|max:255',
            'endereco' => 'required|string|max:255',
            'cep'      => 'nullable|digits:8',
        ], [
            'cep.digits' => 'Informe um CEP válido com 8 números.',
        ]);

        // Verifica se já existe CPF cadastrado
        $cpfExistente = DB::table('Cliente')
            ->where('cpf', $cpf)
            ->exists();

        if ($cpfExistente) {
            return back()
                ->withInput()
                ->withErrors([
                    'cpf' => 'Este CPF já está cadastrado.'
                ]);
        }

        // Verifica se já existe e-mail cadastrado
        $emailExistente = DB::table('Cliente')
            ->where('email', $request->email)
            ->exists();

        if ($emailExistente) {
            return back()
                ->withInput()
                ->withErrors([
                    'email' => 'Este e-mail já está cadastrado.'
                ]);
        }

        // Salva no banco
        $idCliente = DB::table('Cliente')->insertGetId([
            'nome'     => $request->nome,
            'cpf'      => $cpf,
            'telefone' => $request->telefone,
            'email'    => $request->email,
            'senha'    => Hash::make($request->senha),
            'endereco' => $request->endereco,
            'cep'      => $request->cep,
        ]);

        // Cria sessão
        Session::put('id', $idCliente);
        Session::put('nome', $request->nome);
        Session::put('nivel_acesso', 'USUARIO');

        return redirect()->route('index');
    }
}
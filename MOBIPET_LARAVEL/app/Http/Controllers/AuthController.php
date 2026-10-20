<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
     public function index()
    {
        return view('auth.login');
    }

    public function indexFuncionario()
    {
        return view('auth.loginFuncionario');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required'
        ]);

        $cliente = Cliente::where('email', $request->email)
            ->first();

        if (!$cliente) {
            return back()
                ->with('erro', 'Usuário não encontrado.');
        }

        if (!password_verify($request->senha, $cliente->senha)) {
            return back()
                ->with('erro', 'Senha inválida.');
        }

        Session::put('id', $cliente->id_cliente);
        Session::put('nome', $cliente->nome);
        Session::put('nivel_acesso', 'USUARIO');

        return redirect()->route('index');
    }

    public function loginFuncionario(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required'
        ]);

        $funcionario = Funcionario::where('email', $request->email)
            ->first();

        if (!$funcionario) {
            return back()
                ->with('erro', 'Usuário não encontrado.');
        }

        if (!password_verify($request->senha, $funcionario->senha)) {
            return back()
                ->with('erro', 'Senha inválida.');
        }

        // O nível vem do banco: 'FUNCIONARIO' (padrão) ou 'ADMIN'.
        $nivel = $funcionario->nivel_acesso ?: 'FUNCIONARIO';

        Session::put('id', $funcionario->id_funcionario);
        Session::put('nome', $funcionario->nome);
        Session::put('nivel_acesso', $nivel);

        // Administrador cai direto no painel de gestão.
        return redirect()->route($nivel === 'ADMIN' ? 'painel-controle' : 'index');
    }

    public function logout()
    {
        Session::flush();

        return redirect()->route('login');
    }
}

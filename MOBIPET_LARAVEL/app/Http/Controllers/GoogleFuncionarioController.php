<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Socialite;

class GoogleFuncionarioController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')
            ->redirectUrl(route('google.callbackFuncionario'))
            ->redirect();
    }

    // Criar função para fazer login
    public function callbackFuncionario(){
        // Tratamento de erros
        try{
            // Pegar os dados enviados pelo google
            $usuarioGoogle = Socialite::driver('google')
                ->redirectUrl(route('google.callbackFuncionario'))
                ->user();

            // Fazer adaptação para o contexto do banco
            // Procurar um usuário pelo email
            $user = Funcionario::where(
                'email',
                $usuarioGoogle->getEmail()
            )->first();

            // Funcionário não é criado automaticamente: precisa ter sido
            // cadastrado antes pelo administrador (CPF, cargo, admissão...).
            if(!$user){
                return redirect()
                    ->route('login.funcionario')
                    ->with('erro', 'Este e-mail do Google não pertence a nenhum funcionário cadastrado.');
            }

            // O nível vem do banco: 'FUNCIONARIO' (padrão) ou 'ADMIN'.
            $nivel = $user->nivel_acesso ?: 'FUNCIONARIO';

            // Faço o login no sistema
            // Auth::login($user);
            Session::put('id', $user->id_funcionario);
            Session::put('nome', $user->nome);
            Session::put('nivel_acesso', $nivel);

            // Administrador cai direto no painel de gestão.
            return $nivel === 'ADMIN' ? redirect()->route('painel-controle') : redirect('/');

        } catch(Exception $e){
            Log::error('Falha no login com Google (funcionário): ' . $e->getMessage());

            return redirect()
                ->route('login.funcionario')
                ->with('erro', 'Não foi possível concluir o login com Google. Tente novamente.');
        }
    }
}
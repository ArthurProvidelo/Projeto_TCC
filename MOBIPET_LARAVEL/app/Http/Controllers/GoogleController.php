<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Socialite;

class GoogleController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')
            ->redirectUrl(route('google.callback'))
            ->redirect();
    }

    // Criar função para fazer login
    public function callback(){
        // Tratamento de erros
        try{
            // Pegar os dados enviados pelo google
            $usuarioGoogle = Socialite::driver('google')
                ->redirectUrl(route('google.callback'))
                ->user();

            // Fazer adaptação para o contexto do banco
            // Procurar um usuário pelo email
            $user = Cliente::where(
                'email',
                $usuarioGoogle->getEmail()
            )->first();

            // Se não existir usuario, criar usuario
            if(!$user){
                $user = Cliente::create([
                    'nome' => $usuarioGoogle->getName(),
                    'email' => $usuarioGoogle->getEmail(),
                    'senha' => Hash::make('1234')
                ]);
            }

            // Faço o login no sistema
            // Auth::login($user);
            Session::put('id', $user->id_cliente);
            Session::put('nome', $user->nome);
            Session::put('nivel_acesso', 'USUARIO');

            // redireciona para a tela
            return redirect('/');

        } catch(Exception $e){
            Log::error('Falha no login com Google (cliente): ' . $e->getMessage());

            return redirect()
                ->route('login')
                ->with('erro', 'Não foi possível concluir o login com Google. Tente novamente.');
        }
    }
}
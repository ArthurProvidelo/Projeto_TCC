<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends Controller
{
    // Listar funcionários
    public function index()
    {
        // $funcionarios = DB::table('funcionario')->get();
        $funcionarios = Funcionario::all();
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
        return view('funcionarios.create');
    }

    // Salvar novo funcionário
    public function store(Request $request)
    {
        $request->merge([
            'salario' => str_replace(
                ',',
                '.',
                str_replace('.', '', $request->salario)
            ),
            'cep' => preg_replace('/\D/', '', (string) $request->cep) ?: null,
        ]);

        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14',
            'cargo' => 'required|string|max:100',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'endereco' => 'nullable|string|max:255',
            'cep' => 'nullable|digits:8',
            'salario' => 'nullable|numeric|min:0',
            'data_admissao' => 'required|date',
            'senha' => 'required|min:6'
        ], [
            'cep.digits' => 'Informe um CEP válido com 8 números.',
        ]);

        // O Eloquent trata as strings de forma segura, evitando o erro de "coluna não encontrada"
        Funcionario::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'cargo' => $request->cargo,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'cep' => $request->cep,
            'salario' => $request->salario,
            'data_admissao' => $request->data_admissao,
            'senha' => Hash::make($request->senha) // O cast no model já faz isso, mas mantemos por segurança
        ]);

        return redirect()
            ->route('funcionario') // Corrigido para a rota padrão 
            ->with('success', 'Funcionário cadastrado com sucesso!');
    }

    // Visualizar funcionário
    public function show($id)
    {
        // $funcionario = DB::table('funcionario')
        //     ->where('id', $id)
        //     ->first();
        $funcionario = Funcionario::where('id_funcionario', $id)->firstOrFail();

        return view('funcionario.show', compact('funcionario'));
    }

    // Formulário de edição
    public function edit($id)
    {
        // $funcionario = DB::table('funcionario')
        //     ->where('id', $id)
        //     ->first();
        $funcionario = Funcionario::where('id_funcionario', $id)->firstOrFail();

        return view('funcionario.edit', compact('funcionario'));
    }

    // Atualizar funcionário
    public function update(Request $request, $id)
    {
        // CEP é salvo só com os números (a máscara volta na exibição)
        $request->merge([
            'cep' => preg_replace('/\D/', '', (string) $request->cep) ?: null,
        ]);

        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'endereco' => 'nullable|string|max:255',
            'cep' => 'nullable|digits:8',
        ], [
            'cep.digits' => 'Informe um CEP válido com 8 números.',
        ]);

        // Atualizando com base na chave correta
        Funcionario::where('id_funcionario', $id)->update([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'endereco' => $request->endereco,
            'cep' => $request->cep,
        ]);

        return redirect()->route('perfil')
            ->with('success', 'Funcionário atualizado com sucesso!');
    }

    // Excluir funcionário
    public function destroy($id)
    {   
        // Deletando com base na chave correta
        Funcionario::where('id_funcionario', $id)->delete();

        return redirect()->route('funcionario.index')
            ->with('success', 'Funcionário excluído com sucesso!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    // Exibe a página com o formulário de cadastro de serviços.
    public function create()
    {
        return view('cadastroServicos');
    }

    // Valida os dados enviados e salva o novo serviço no banco de dados.
    public function store(Request $request)
    {
        // O campo "Preço" usa máscara de moeda (ex: 1.234,56) e o campo
        // "Tempo Estimado" usa máscara de horário (ex: 01:30). Normaliza
        // os dois para o formato que a validação/banco esperam antes de validar.
        $preco = preg_replace('/\.(?=\d{3}(,|$))/', '', (string) $request->preco);
        $preco = str_replace(',', '.', $preco);

        $duracaoMinutos = null;
        if (preg_match('/^(\d{1,2}):(\d{2})$/', (string) $request->duracao, $partes)) {
            $duracaoMinutos = ((int) $partes[1] * 60) + (int) $partes[2];
        }

        $request->merge([
            'preco' => $preco,
            'duracao' => $duracaoMinutos,
        ]);

        // 1. Validação dos dados com base nos campos obrigatórios (*) do HTML
        $dadosValidados = $request->validate([
            'nome'          => 'required|string|max:255',
            'categoria'     => 'required|string|in:banho,tosa,consulta,outros',
            'preco'         => 'required|numeric|min:0',
            'duracao'       => 'required|integer|min:1',
            'descricao'     => 'nullable|string|max:1000',
        ], [
            // Mensagens de erro personalizadas (opcional)
            'nome.required'      => 'O campo Nome do Serviço é obrigatório.',
            'categoria.required' => 'Selecione uma categoria válida.',
            'preco.required'     => 'O preço do serviço deve ser preenchido.',
            'duracao.required'   => 'Informe um tempo de duração estimado válido (HH:MM).',
        ]);

        // 2. Salva as informações validadas utilizando a Model
        Servico::create([
            'nome'             => $dadosValidados['nome'],
            'categoria'        => $dadosValidados['categoria'],
            'descricao'        => $dadosValidados['descricao'] ?? null,
            'preco'            => $dadosValidados['preco'],
            'duracao_estimada' => $dadosValidados['duracao'],
        ]);

        // 3. Redireciona o usuário de volta para o formulário com uma mensagem de sucesso
        return redirect()->route('services.create')
                         ->with('success', 'Serviço cadastrado com sucesso!');
    }
}
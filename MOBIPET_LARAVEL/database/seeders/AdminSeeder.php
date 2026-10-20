<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Cria (ou atualiza) o administrador padrão do sistema.
     *
     *   E-mail: admin@mobipet.com
     *   Senha:  admin1234
     *
     * Altere a senha após o primeiro acesso.
     */
    public function run(): void
    {
        Funcionario::updateOrCreate(
            ['email' => 'admin@mobipet.com'],
            [
                'nome' => 'Administrador Mobipet',
                'cpf' => '00000000000',
                'cargo' => 'Administrador',
                'telefone' => '(19) 90000-0000',
                'endereco' => 'Sede Mobipet',
                'salario' => 0,
                'data_admissao' => now()->toDateString(),
                'senha' => Hash::make('admin1234'),
                'nivel_acesso' => 'ADMIN',
            ]
        );
    }
}

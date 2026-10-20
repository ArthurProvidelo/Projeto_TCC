<?php

// Web Routes -> Importação das controllers necessários
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\GoogleFuncionarioController;
use App\Http\Controllers\SenhaController;

Route::get('/pets/atualizar-tabela',
[PetController::class, 'atualizarTabela'])
    ->name('pets.atualizarTabela');

Route::get('/', function () {
    return view('index');
})->name('index');

// Rota para a página de erro 404 (a view fica em resources/views/errors/404.blade.php)
Route::get('404', function () {
    return response()->view('errors.404', [], 404);
})->name('404');

// Rota para a página de sobre
Route::get('/sobre', function () {
    return view('sobre');
})->name('sobre');

// Rota para processar o formulário de cadastro de funcionário (somente ADMIN)
Route::post('/funcionario/salvar', [FuncionarioController::class, 'store'])
    ->middleware('admin')
    ->name('funcionario.salvar');

// Rota para exibir a página de agendamento
Route::get('/agendamento', [AgendamentoController::class, 'create'])
    ->name('agendamento');

// Rota para processar o formulário de agendamento
Route::post('/agendamento/store', [AgendamentoController::class, 'store'])
    ->name('agendamento.store');

// Rota (AJAX) que devolve os horários livres/ocupados de um profissional numa data
Route::get('/agendamento/horarios', [AgendamentoController::class, 'horarios'])
    ->name('agendamento.horarios');

// Rota para exibir a página de cadastro de funcionários (somente ADMIN)
Route::get('/funcionario', function () {
    return view('auth.funcionario');
})->middleware('admin')->name('funcionario');

// Rota para exibir a página de desenvolvedores
// Os 5 commits mostrados no terminal vêm direto do GitHub (repo ArthurProvidelo/MOBIPET_TCC_2026),
// com cache de 5 minutos: a página sempre reflete o histórico real, sem precisar redeploy
// a cada commit, e sem martelar a API do GitHub a cada visita.
Route::get('/devs', function () {
    $commits = Cache::remember('mobipet_github_commits', now()->addMinutes(5), function () {
        try {
            $response = Http::withHeaders(['Accept' => 'application/vnd.github+json'])
                ->timeout(3)
                ->get('https://api.github.com/repos/ArthurProvidelo/MOBIPET_TCC_2026/commits', [
                    'per_page' => 5,
                ]);

            if (! $response->successful()) {
                return null;
            }

            return collect($response->json())->map(fn ($commit) => [
                'sha'     => substr($commit['sha'], 0, 7),
                'message' => strtok($commit['commit']['message'], "\n"),
            ])->all();
        } catch (\Throwable $e) {
            return null;
        }
    });

    return view('devs', ['commits' => $commits]);
})->name('devs');

// Rota para exibir a página de FAQ
Route::get('/faq', function () {
    return view('faq');
})->name('faq');

// Rota para exibir a página de serviços
Route::get('/services', function () {
    return view('services');
})->name('services');

// Rota para exibir o perfil do cliente
Route::get('/perfil', [ClienteController::class, 'perfil'])
    ->name('perfil');

// Rota para atualizar o perfil do cliente
Route::put('/perfil', [ClienteController::class, 'updatePerfil'])
    ->name('perfil.update');

Route::put('/perfil-update/{id}', [FuncionarioController::class, 'update'])
    ->name('funcionario.update');


// Rota para o painel de controle da equipe (funcionário ou admin)
Route::get('/painel-controle', [PainelController::class, 'index'])
    ->middleware('staff')
    ->name('painel-controle');

// Rotas de autenticação
Route::get('/login', [AuthController::class, 'index'])
    ->name('login');


// Rotas de funcionários

// Rota para exibir a página de login do funcionário
Route::get('/login/funcionario', [AuthController::class, 'indexFuncionario'])
    ->name('login.funcionario');

// Rota para processar o login do cliente
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.autenticar');

// Rota para processar o login do funcionário
Route::post('/login-funcionario', [AuthController::class, 'loginFuncionario'])
    ->name('login.autenticarFuncionario');

// Rota para exibir a agenda do funcionário (mês > dia > agendamentos)
Route::get('/funcionario/agendamentos', [AgendamentoController::class, 'agendamentosFuncionario'])
    ->middleware('staff')
    ->name('funcionario.agendamentos');

// rota para atualizar status na tela de agendamento
Route::patch('/agendamentos/{agendamento}/status', [AgendamentoController::class, 'atualizarStatus'])
    ->name('agendamentos.atualizarStatus');

// rotas (AJAX) da esteira de atendimento no painel do funcionário: o
// check-in/avançar segue a ordem de servico_etapas; o PATCH coloca o
// agendamento direto numa etapa (backup quando o leitor RFID não funciona)
Route::post('/agendamentos/{agendamento}/avancar-etapa', [AgendamentoController::class, 'avancarEtapa'])
    ->middleware('staff')
    ->name('agendamentos.avancarEtapa');

Route::patch('/agendamentos/{agendamento}/etapa', [AgendamentoController::class, 'definirEtapa'])
    ->middleware('staff')
    ->name('agendamentos.definirEtapa');

// (AJAX) Esteira atual do agendamento, consultada pelo "Ver detalhes" do
// painel enquanto está aberto — reflete as leituras do RFID e as ações do
// app mobile sem recarregar a página.
Route::get('/agendamentos/{agendamento}/esteira', [AgendamentoController::class, 'esteira'])
    ->middleware('staff')
    ->name('agendamentos.esteira');

// Rota para logout (tanto para clientes quanto para funcionários)
Route::get('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// Rotas para CRUD de Pets
Route::resource('pets', PetController::class);


// Rota para exibir a view de cadastro
Route::get('/cadastro', [LoginController::class, 'exibirCadastro'])
    ->name('cadastro');

// Rota POST para receber os dados do formulário e salvar no banco
Route::post('/cadastro/salvar', [LoginController::class, 'salvarCadastro'])
    ->name('cadastro.salvar');

// Rota que renderiza o formulário HTML (Método GET)
Route::get('/servicos/cadastrar', [ServicoController::class, 'create'])
    ->name('services.create');

// Rota que processa os dados e salva no banco (Método POST)
Route::post('/servicos/salvar', [ServicoController::class, 'store'])
    ->name('services.store');

// Google
Route::get('/auth/google', [GoogleController::class, 'redirect'])
    ->name('google.login');

Route::get('/auth/google/callback', [GoogleController::class, 'callback'])
    ->name('google.callback');

// Google Funcionario
Route::get('/auth/googleFuncionario', [GoogleFuncionarioController::class, 'redirect'])
    ->name('google.loginFuncionario');

Route::get('/auth/google/callbackFuncionario', [GoogleFuncionarioController::class, 'callbackFuncionario'])
    ->name('google.callbackFuncionario');



// ===============================
// RECUPERAÇÃO DE SENHA (conferência de e-mail + CPF, sem envio de e-mail)
// ===============================

// Tela para informar o e-mail e o CPF cadastrados
Route::get('/recuperar-senha', [SenhaController::class, 'formularioRecuperar'])
    ->name('senha.recuperar');

// Confere se o e-mail e o CPF batem com algum cliente
Route::post('/recuperar-senha', [SenhaController::class, 'verificarIdentidade'])
    ->name('senha.verificar');


// ===============================
// REDEFINIÇÃO DE SENHA
// ===============================

// Tela para criar uma nova senha (liberada só após a conferência)
Route::get('/redefinir-senha', [SenhaController::class, 'formulario'])
    ->name('senha.redefinir');


// Atualiza a senha
Route::post('/redefinir-senha', [SenhaController::class, 'atualizar'])
    ->name('senha.atualizar');

Route::post(
    '/agendamento/{id}/resetar',
    [AgendamentoController::class, 'resetar']
)->name('agendamento.resetar');

// ===============================
// PÁGINA 404 (FALLBACK)
// ===============================

// Qualquer URL que não bateu com nenhuma rota acima cai aqui.
// Passa pelo grupo "web", então a sessão existe e o menu mostra o usuário logado.
// Deve ficar SEMPRE por último neste arquivo.
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

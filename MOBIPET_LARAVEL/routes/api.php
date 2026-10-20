<?php

use App\Http\Controllers\Api\AgendamentoController;
use App\Http\Controllers\Api\AtendimentoController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartaoController;
use App\Http\Controllers\Api\FuncionarioController;
use App\Http\Controllers\Api\PetController;
use App\Http\Controllers\Api\ServicoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Autenticação do app mobile (cliente), via token Sanctum.
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/esqueci-senha', [AuthController::class, 'forgotPassword']);

// Cadastro RFID: sketch de cadastro do ESP32 grava o pet_id no cartão e
// envia {"uid": "...", "pet_id": 33} para vincular os dois. Sem autenticação.
Route::post('/cartoes', [CartaoController::class, 'store']);

// Leitura RFID: sketch de leitura do ESP32 envia {"pet_id": 33} (lido do
// cartão). Localiza o agendamento do dia daquele pet ainda não concluído e
// avança para a próxima etapa (check-in -> etapas do serviço -> Concluido).
// Sem autenticação.
Route::post('/agendamentos/avancar-rfid', [AgendamentoController::class, 'avancarPorPet']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::put('/perfil', [AuthController::class, 'updateProfile']);
    Route::put('/senha', [AuthController::class, 'changePassword']);

    Route::get('/pets', [PetController::class, 'index']);
    Route::post('/pets', [PetController::class, 'store']);
    Route::get('/pets/{id}', [PetController::class, 'show']);
    Route::put('/pets/{id}', [PetController::class, 'update']);
    Route::delete('/pets/{id}', [PetController::class, 'destroy']);
    Route::get('/pets/{id}/atendimento-atual', [PetController::class, 'atendimentoAtual']);

    Route::get('/servicos', [ServicoController::class, 'index']);
    Route::get('/funcionarios', [FuncionarioController::class, 'index']);
    Route::get('/horarios', [AgendamentoController::class, 'horarios']);

    Route::get('/agendamentos', [AgendamentoController::class, 'index']);
    Route::get('/agendamentos/atual', [AgendamentoController::class, 'atual']);
    Route::get('/agendamentos/proximos', [AgendamentoController::class, 'proximos']);
    Route::get('/clientes/{id}/agendamentos', [AgendamentoController::class, 'porCliente']);
    Route::post('/agendamentos', [AgendamentoController::class, 'store']);
    Route::patch('/agendamentos/{id}/cancelar', [AgendamentoController::class, 'cancelar']);
    Route::delete('/agendamentos/{id}', [AgendamentoController::class, 'destroy']);
    Route::post('/agendamentos/{id}/iniciar', [AgendamentoController::class, 'iniciar']);
    Route::post('/agendamentos/{id}/avancar', [AgendamentoController::class, 'avancar']);
});

<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Pet;
use App\Models\Funcionario;
use Carbon\Carbon;

class PainelController extends Controller
{
    public function index()
    {
        $agendamentosHoje = Agendamento::whereDate(
            'data_agendamento',
            Carbon::today()
        )->count();

        $pets = Pet::count();

        $pendentes = Agendamento::where(
            'status_agendamento',
            'Pendente'
        )->count();

        $funcionarios = Funcionario::count();

        $ultimosAgendamentos = Agendamento::with([
            'pet',
            'servico.servicoEtapas',
            'funcionario',
        ])
        ->latest('id_agendamento')
        ->take(10)
        ->get();

        // Esteira de atendimento do dia: agendamentos de hoje aguardando o
        // check-in ou já em atendimento, para o funcionário passar as etapas
        // (backup manual do RFID).
        $agendamentosEsteira = Agendamento::whereDate('data_agendamento', Carbon::today())
            ->whereIn('status_agendamento', ['Pendente', 'Em atendimento'])
            ->with(['pet', 'servico.servicoEtapas'])
            ->orderByRaw("status_agendamento = 'Em atendimento' DESC")
            ->orderBy('horario')
            ->get();

        return view(
            'painel-controle',
            compact(
                'agendamentosHoje',
                'pets',
                'pendentes',
                'funcionarios',
                'ultimosAgendamentos',
                'agendamentosEsteira'
            )
        );
    }
}

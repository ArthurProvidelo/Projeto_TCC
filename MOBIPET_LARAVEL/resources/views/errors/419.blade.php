{{-- Sessão expirada (token CSRF inválido) --}}
@extends('errors.layout')

@section('code', '419')
@section('title', 'Sessão expirada')
@section('eyebrow', 'Erro 419')
@section('heading', 'Sua sessão tirou uma soneca.')
@section('message')
    Por segurança, o formulário expirou depois de um tempo parado.
    <span class="er-mark-text">Recarregue a página</span> e envie novamente — é rapidinho.
@endsection

@section('actions')
    <button type="button" class="er-btn er-btn--primary" data-er-back>
        <i class="bi bi-arrow-clockwise"></i> Voltar e tentar de novo
    </button>
    <a href="{{ url('/') }}" class="er-btn er-btn--ghost">
        <i class="bi bi-house-door"></i> Ir para o início
    </a>
@endsection

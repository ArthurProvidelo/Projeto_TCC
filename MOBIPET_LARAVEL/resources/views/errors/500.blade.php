{{-- Erro interno do servidor --}}
@extends('errors.layout')

@section('code', '500')
@section('title', 'Erro no servidor')
@section('eyebrow', 'Erro 500')
@section('heading', 'Algo deu errado por aqui.')
@section('message')
    Tivemos um problema inesperado no nosso servidor. Nossa equipe já está cuidando disso
    com o mesmo carinho que cuidamos do seu pet. <span class="er-mark-text">Tente novamente em instantes.</span>
@endsection

@section('actions')
    <button type="button" class="er-btn er-btn--primary" onclick="location.reload()">
        <i class="bi bi-arrow-clockwise"></i> Tentar novamente
    </button>
    <a href="{{ url('/') }}" class="er-btn er-btn--ghost">
        <i class="bi bi-house-door"></i> Ir para o início
    </a>
@endsection

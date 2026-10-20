{{-- Em manutenção (php artisan down) --}}
@extends('errors.layout')

@section('code', '503')
@section('title', 'Em manutenção')
@section('eyebrow', 'Voltamos já')
@section('heading', 'Estamos dando um banho no sistema.')
@section('message')
    O Mobipet está passando por uma manutenção rápida para ficar ainda melhor.
    <span class="er-mark-text">Volte em alguns minutos</span> — seu pet agradece a paciência!
@endsection

@section('actions')
    <button type="button" class="er-btn er-btn--primary" onclick="location.reload()">
        <i class="bi bi-arrow-clockwise"></i> Tentar novamente
    </button>
@endsection

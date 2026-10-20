{{-- Página não encontrada — renderizada automaticamente pelo Laravel em qualquer 404 --}}
@extends('errors.layout', ['showNav' => true])

@section('code', '404')
@section('title', 'Página não encontrada')
@section('eyebrow', 'Erro 404')
@section('heading', 'Ops! Essa patinha se perdeu.')
@section('message')
    Farejamos por todo canto, mas a página que você procura
    <span class="er-mark-text">não existe ou mudou de endereço</span>.
    Que tal seguir por um dos caminhos abaixo?
@endsection

@section('extra')
    <div class="er-links">
        <a href="{{ route('services') }}" class="er-link"><i class="bi bi-scissors"></i> Nossos serviços</a>
        <a href="{{ route('agendamento') }}" class="er-link"><i class="bi bi-calendar-check"></i> Agendar horário</a>
        <a href="{{ route('sobre') }}" class="er-link"><i class="bi bi-heart"></i> Sobre o Mobipet</a>
        <a href="{{ route('faq') }}" class="er-link"><i class="bi bi-question-circle"></i> Dúvidas frequentes</a>
    </div>
@endsection

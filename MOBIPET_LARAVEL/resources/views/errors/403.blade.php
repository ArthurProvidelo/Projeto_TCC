{{-- Acesso negado --}}
@extends('errors.layout', ['showNav' => true])

@section('code', '403')
@section('title', 'Acesso negado')
@section('eyebrow', 'Erro 403')
@section('heading', 'Essa área é só para a equipe.')
@section('message')
    Você não tem permissão para acessar esta página.
    Se acredita que isso é um engano, <span class="er-mark-text">entre com a conta correta</span>
    ou fale com o administrador do petshop.
@endsection

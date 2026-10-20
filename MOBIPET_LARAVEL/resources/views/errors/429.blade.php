{{-- Muitas requisições --}}
@extends('errors.layout')

@section('code', '429')
@section('title', 'Muitas tentativas')
@section('eyebrow', 'Erro 429')
@section('heading', 'Calma, muitas patinhas ao mesmo tempo!')
@section('message')
    Recebemos várias solicitações em pouco tempo.
    <span class="er-mark-text">Aguarde alguns instantes</span> e tente novamente.
@endsection

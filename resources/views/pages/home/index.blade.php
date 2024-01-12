@extends('layouts.app')

@section('content')
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">{{ __('Sistema de Cadastro de Usuários') }}</h1>
            <p class="col-md-8 fs-4">
                {{ __('Bem vindo(a) ao sistema de cadastro de usuários, cadastre seu usuário clicando no link abaixo') }}
            </p>
            <a href="{{ route('registration') }}" class="btn btn-primary btn-lg">{{ __('Cadastro de Usuários') }}</a>
        </div>
    </div>
@endsection

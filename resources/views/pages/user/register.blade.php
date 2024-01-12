@extends('layouts.app')

@section('content')
    <x-slot:title>
        {{ __('Cadastro de Usuários') }}
    </x-slot>
    <div>
        <div class="card w-50 p-3 m-auto">
            <div class="card-body">

                <div id="validation-alert"></div>

                <form id="user-registration" novalidate>
                    <div class="mb-3">
                        <label for="signup-name" class="form-label">{{ __('Nome Completo') }}</label>
                        <input type="text" class="form-control p-3 bg-light" min="3" max="50" required
                            name="name" id="signup-name" placeholder="{{ __('Nome Completo') }}">
                    </div>
                    <div class="mb-3">
                        <label for="signup-email" class="form-label">{{ __('Seu Email') }}</label>
                        <input type="email" class="form-control p-3 bg-light" required name="email" id="signup-email"
                            placeholder="{{ __('Email') }}">
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="signup-password" class="form-label">{{ __('Senha') }}</label>
                            <input type="password" required class="form-control p-3 bg-light" min="6" max="20"
                                name="password" id="signup-password" placeholder="{{ __('Senha') }}">
                        </div>
                        <div class="col">
                            <label for="signup-confirm-password" class="form-label">{{ __('Confirma a Senha') }}</label>
                            <input type="password" required class="form-control p-3 bg-light" min="6" max="20"
                                name="password_confirmation" id="signup-confirm-password"
                                placeholder="{{ __('Confirma a Senha') }}">
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        (() => {
            'use strict'

            const form = document.getElementById('user-registration')
            form.addEventListener('submit', event => {

                event.preventDefault()
                event.stopPropagation()

                if (form.checkValidity()) {

                    let data = {
                        name: document.getElementById('signup-name').value,
                        email: document.getElementById('signup-email').value,
                        password: document.getElementById('signup-password').value,
                        password_confirmation: document.getElementById('signup-confirm-password').value,
                    }

                    let alert = document.getElementById('validation-alert')

                    alert.innerHTML = ''

                    axios.post("{{ route('v1.users.registration') }}", data).then(function(response) {
                            let msgSuccess = "{{ __('Cadastro de usuário realizado com sucesso') }}";

                            alert.innerHTML +=
                                '<div class="alert alert-success" id="validation-alert" role="alert"><h6><strong>' +
                                msgSuccess + '</strong></h6></div>';
                        })
                        .catch(function(error) {

                            form.classList.remove('was-validated')

                            let errorMessage = error.response.data.data

                            if (errorMessage) {
                                let message = ''

                                for (const [key, value] of Object.entries(errorMessage)) {

                                    value.forEach(function(data) {
                                        message += '<li>' + data + '</li>'
                                    });
                                }

                                alert.innerHTML +=
                                    '<div class="alert alert-danger" id="validation-alert" role="alert"><h6>Ops!</h6><ul class="mb-0">' +
                                    message + '</ul> </div>';
                            }

                        });
                }

                form.classList.add('was-validated')
            })
        })()
    </script>
@endpush()

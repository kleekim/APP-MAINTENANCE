@extends('components.layouts.app.misepg')

@section('content')

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f3f4f6;
    }

    .setup-wrapper {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 20px;
        background: #f3f4f6;
    }

    .setup-card {
        width: 100%;
        max-width: 550px;
        background: #ffffff;
        border-radius: 18px;
        padding: 45px;
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
        border-top: 6px solid #006937;
    }

    .setup-header {
        text-align: center;
        margin-bottom: 25px;
    }

    .setup-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #111827;
        margin-bottom: 10px;
    }

    .setup-subtitle {
        font-size: 15px;
        color: #6b7280;
        line-height: 1.7;
    }

    .form-group {
        margin-top: 20px;
    }

    .form-group label {
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
        color: #1f2937;
    }

    .form-group input {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        font-size: 15px;
        color: #111827;
        transition: 0.2s;
    }

    .form-group input:focus {
        outline: none;
        border-color: #006937;
        box-shadow: 0 0 0 3px rgba(0, 105, 55, 0.1);
    }

    .setup-btn {
        width: 100%;
        height: 55px;
        margin-top: 25px;
        border: none;
        border-radius: 10px;
        background: #006937;
        color: white;
        font-size: 17px;
        font-weight: 700;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .setup-btn:hover {
        background: #005229;
    }

    .password-field-wrapper {
        position: relative;
    }

    .password-field-wrapper input {
        padding-right: 45px;
    }

    .password-toggle-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #6b7280;
        font-size: 16px;
    }

    .password-toggle-icon:hover {
        color: #006937;
    }

    .text-red-600 {
        color: #dc2626;
    }
</style>

<div class="setup-wrapper">
    <div class="setup-card">
        {{-- HEADER (sans logo) --}}
        <div class="setup-header">
            <h2 class="setup-title">
                Bienvenue, {{ $user->name }}
            </h2>
            <p class="setup-subtitle">
                Votre demande a été approuvée. Définissez votre mot de passe pour accéder à votre espace.
            </p>
        </div>

      
        <x-validation-errors class="mb-4" />

      
        <form method="POST" action="{{ route('password.setup.store', [
            'user'      => $user->id,
            'signature' => request('signature'),
            'expires'   => request('expires'),
            'token'     => request('token'),
        ]) }}">
            @csrf

           
            <input type="hidden" name="token" value="{{ request('token') }}">

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <div class="password-field-wrapper">
                    <input id="password" type="password" name="password" required autocomplete="new-password">
                    <i class="fa-solid fa-eye password-toggle-icon" onclick="togglePasswordVisibility('password', this)"></i>
                </div>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <div class="password-field-wrapper">
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                    <i class="fa-solid fa-eye password-toggle-icon" onclick="togglePasswordVisibility('password_confirmation', this)"></i>
                </div>
            </div>

            <button type="submit" class="setup-btn">
                Définir mon mot de passe
            </button>
        </form>
    </div>
</div>

<script>
    function togglePasswordVisibility(inputId, icon) {
        const input = document.getElementById(inputId);
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

@endsection
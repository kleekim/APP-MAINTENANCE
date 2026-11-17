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

    .reset-wrapper {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 20px;
        background: #f3f4f6;
    }

    .reset-card {
        width: 100%;
        max-width: 550px;
        background: #ffffff;
        border-radius: 18px;
        padding: 45px;
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
        border-top: 6px solid #006937;
    }

    .reset-header {
        text-align: center;
        margin-bottom: 25px;
    }

    .reset-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #111827;
        margin-bottom: 10px;
    }

    .reset-subtitle {
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
        transition: 0.2s;
    }

    .form-group input:focus {
        outline: none;
        border-color: #006937;
        box-shadow: 0 0 0 3px rgba(0, 105, 55, 0.1);
    }

    .reset-btn {
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

    .reset-btn:hover {
        background: #005229;
    }
</style>

<div class="reset-wrapper">
    <div class="reset-card">
       
        <div class="reset-header">
            <h2 class="reset-title">
                Réinitialisation du mot de passe
            </h2>
            <p class="reset-subtitle">
                Veuillez saisir votre email et votre nouveau mot de passe
            </p>
        </div>

        
        <x-validation-errors class="mb-4" />

       
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
            </div>

            <div class="form-group">
                <label for="password">Nouveau mot de passe</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>

            <button type="submit" class="reset-btn">
                Réinitialiser mon mot de passe
            </button>
        </form>
    </div>
</div>

@endsection
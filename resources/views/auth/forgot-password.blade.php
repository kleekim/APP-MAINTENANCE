@extends('components.layouts.app.misepg')

@section('content')

<style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }

    body{
        font-family:"Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background:#f3f4f6;
    }

    .forgot-wrapper{
        min-height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
        padding:40px 20px;
    }

    .forgot-card{
        width:100%;
        max-width:550px;
        background:#ffffff;
        border-radius:18px;
        padding:45px;
        box-shadow:0 10px 35px rgba(0,0,0,0.08);
        border-top:6px solid #f7be00;
    }

    .forgot-header{
        text-align:center;
        margin-bottom:35px;
    }

    .forgot-title{
        font-size:2rem;
        font-weight:700;
        color:#111827;
        margin-bottom:10px;
    }

    .forgot-subtitle{
        font-size:16px;
        color:#6b7280;
        line-height:1.7;
    }

    .status-message{
        background:#ecfdf5;
        color:#065f46;
        padding:15px;
        border-radius:10px;
        margin-bottom:20px;
        font-size:15px;
        font-weight:600;
    }

    .form-group{
        margin-top:25px;
    }

    .forgot-label{
        display:block;
        margin-bottom:12px;
        font-size:18px;
        font-weight:700;
        color:#111827;
    }

    .forgot-input{
        width:100%;
        height:58px;
        border:2px solid #d1d5db;
        border-radius:10px;
        padding:0 18px;

        font-size:18px;
        font-weight:500;
        color:#111827;

        outline:none;
        transition:0.25s ease;
    }

    .forgot-input:focus{
        border-color:#006937;
        box-shadow:0 0 0 4px rgba(0,105,55,0.12);
    }

    .forgot-input::placeholder{
        font-size:16px;
        color:#9ca3af;
    }

    .forgot-btn{
        width:100%;
        height:58px;
        margin-top:30px;

        border:none;
        border-radius:10px;

        background:#006937;
        color:white;

        font-size:18px;
        font-weight:700;

        cursor:pointer;
        transition:0.3s ease;
    }

    .forgot-btn:hover{
        background:#005229;
    }

    .forgot-divider{
        display:flex;
        justify-content:center;
        gap:10px;
        margin-top:35px;
    }

    .forgot-divider span{
        width:70px;
        height:5px;
        border-radius:20px;
    }

    @media(max-width:600px){

        .forgot-card{
            padding:30px 22px;
        }

        .forgot-title{
            font-size:1.6rem;
        }

        .forgot-input{
            font-size:16px;
        }

        .forgot-btn{
            font-size:16px;
        }
    }

</style>

<div class="forgot-wrapper">

    <div class="forgot-card">

        <div class="forgot-header">

            <h2 class="forgot-title">
                Mot de passe oublié ?
            </h2>

            <p class="forgot-subtitle">
                Entrez votre adresse e-mail et nous vous enverrons un lien
                pour réinitialiser votre mot de passe.
            </p>

        </div>

        @session('status')
            <div class="status-message">
                {{ $value }}
            </div>
        @endsession

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">

                <label for="email" class="forgot-label">
                    Adresse e-mail
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    class="forgot-input"
                    value="{{ old('email') }}"
                    placeholder="Entrez votre adresse e-mail"
                    required
                    autofocus
                    autocomplete="username"
                >

            </div>

            <button type="submit" class="forgot-btn">
                Envoyer le lien de réinitialisation
            </button>

        </form>

        <div class="forgot-divider">
            <span style="background:#006937;"></span>
            <span style="background:#f7be00;"></span>
            <span style="background:#ae1410;"></span>
        </div>

    </div>

</div>

@endsection
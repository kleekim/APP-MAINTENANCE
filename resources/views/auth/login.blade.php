@extends('components.layouts.app.misepg')

@section('content')

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f9;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            background: #f3f4f6;
        }

        .login-card {
            width: 100%;
            max-width: 520px;
            background: #ffffff;
            border-radius: 18px;
            padding: 45px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
            border-top: 6px solid #f7be00;
        }

        .login-logo-wrapper {
            text-align: center;
            margin-bottom: 35px;
        }

        .login-title {
            margin-top: 15px;
            font-size: 1.4rem;
            font-weight: 700;
            color: #006937;
            line-height: 1.5;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .login-title span {
            color: #ae1410;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .login-label {
            display: block;
            margin-bottom: 12px;
            font-size: 18px;
            font-weight: 700;
            color: #111827;
        }

        .login-input {
            width: 100%;
            height: 58px;
            padding: 0 18px;
            border: 2px solid #d1d5db;
            border-radius: 10px;

            font-size: 17px;
            font-weight: 500;
            line-height: 1.5;

            color: #111827;
            background: #fff;

            transition: all 0.25s ease;

            outline: none;
        }

        .login-input::placeholder {
            color: #9ca3af;
            font-size: 16px;
        }

        .login-input:focus {
            border-color: #16a34a;
            box-shadow: 0 0 0 4px rgba(0, 105, 55, 0.12);
        }


        .login-input:-webkit-autofill,
        .login-input:-webkit-autofill:hover,
        .login-input:-webkit-autofill:focus {
            -webkit-text-fill-color: #111827;
            transition: background-color 5000s ease-in-out 0s;
            font-size: 17px;
            font-weight: 500;
        }

        .login-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 5px;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .remember-box {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 15px;
            color: #374151;
        }

        .remember-box input {
            width: 18px;
            height: 18px;
            accent-color: #006937;
            cursor: pointer;
        }

        .login-forgot,
        .login-forgot:visited,
        .login-forgot:active,
        .login-forgot:focus {
            font-size: 15px;
            color: #006937;
            text-decoration: none;
            font-weight: 600;
        }

        .login-forgot:hover {
            color: #005229;
            text-decoration: underline;
        }

        .login-forgot:hover {
            text-decoration: underline;
        }

        .login-btn {
            width: 100%;
            height: 58px;
            border: none;
            border-radius: 10px;
            background: #006937;
            color: white;

            font-size: 18px;
            font-weight: 700;

            cursor: pointer;
            transition: 0.3s ease;
        }

        .login-btn:hover {
            background: #005229;
            transform: translateY(-1px);
        }

        .login-divider {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 35px;
        }

        .login-divider span {
            width: 70px;
            height: 5px;
            border-radius: 30px;
        }

        .status-message {
            padding: 14px;
            border-radius: 8px;
            background: #ecfdf5;
            color: #065f46;
            font-size: 15px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .text-red-600 {
            color: #dc2626;
        }

        .password-field-wrapper {
            position: relative;
        }

        .password-field-wrapper .login-input {
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

        
        .login-input::-ms-reveal,
        .login-input::-ms-clear {
            display: none;
        }

        .login-input::-webkit-textfield-decoration-container {
            visibility: hidden;
        }

        /* Responsive */
        @media(max-width:600px) {

            .login-card {
                padding: 30px 22px;
            }

            .login-title {
                font-size: 1.1rem;
            }

            .login-input {
                height: 54px;
                font-size: 16px;
            }

            .login-btn {
                height: 54px;
                font-size: 16px;
            }

            .login-options {
                flex-direction: column;
                align-items: flex-start;
            }


        }
    </style>

    <div class="login-wrapper">

        <div class="login-card">

            <div class="login-logo-wrapper">

                <h2 class="login-title">
                    Connectez-vous à votre compte
                </h2>

                <p class="login-subtitle">
                    Entrez vos identifiants pour accéder à la plateforme
                </p>

            </div>

            <x-validation-errors class="mb-4" />

            @session('status')
                <div class="status-message">
                    {{ $value }}
                </div>
            @endsession

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label class="login-label" for="email">
                        Adresse e-mail
                    </label>

                    <input class="login-input" id="email" type="email" name="email" value="{{ old('email') }}"
                        placeholder="Entrez votre adresse e-mail" required autofocus autocomplete="username">
                </div>

                <div class="form-group">
                    <label class="login-label" for="password">
                        Mot de passe
                    </label>

                    <div class="password-field-wrapper">
                        <input class="login-input" id="password" type="password" name="password"
                            placeholder="Entrez votre mot de passe" required autocomplete="current-password">
                        <i class="fa-solid fa-eye password-toggle-icon" onclick="togglePasswordVisibility('password', this)"></i>
                    </div>
                </div>

                <div class="login-options">

                    <label class="remember-box">
                        <input type="checkbox" name="remember" id="remember_me">
                        <span>Se souvenir de moi</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="login-forgot" href="{{ route('password.request') }}">
                            Mot de passe oublié ?
                        </a>
                    @endif

                </div>

                <button type="submit" class="login-btn">
                    Se connecter
                </button>

            </form>

            <div class="login-divider">
                <span style="background:#006937;"></span>
                <span style="background:#f7be00;"></span>
                <span style="background:#ae1410;"></span>
            </div>

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
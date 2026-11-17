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

        .login-subtitle {
            margin-top: 10px;
            font-size: 15px;
            color: #6b7280;
            line-height: 1.6;
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
            color: #111827;
            background: #fff;

            transition: all 0.25s ease;
            outline: none;
        }

        .login-input:focus {
            border-color: #16a34a;
            box-shadow: 0 0 0 4px rgba(0, 105, 55, 0.12);
        }

        .login-input::placeholder {
            color: #9ca3af;
        }

        .two-factor-message {
            padding: 14px;
            border-radius: 8px;
            background: #ecfdf5;
            color: #065f46;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 24px;
            text-align: center;
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

        .two-factor-link {
            display: block;
            margin-top: 18px;
            text-align: center;

            border: none;
            background: none;

            font-size: 15px;
            color: #006937;
            text-decoration: none;
            font-weight: 600;

            cursor: pointer;
            width: 100%;
        }

        .two-factor-link:hover {
            color: #005229;
            text-decoration: underline;
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

        
        [x-cloak] {
            display: none ;
        }

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
        }
    </style>


    <div class="login-wrapper">

        <div class="login-card">

            <div class="login-logo-wrapper">

                <h2 class="login-title">
                    Authentification à deux facteurs
                </h2>

                <p class="login-subtitle">
                    Sécurisez votre accès à la plateforme
                </p>

            </div>


            <div x-data="{ recovery: false }">

               
                <div class="two-factor-message" x-show="! recovery">
                    {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
                </div>

               
                <div class="two-factor-message" x-cloak x-show="recovery">
                    {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
                </div>


                <x-validation-errors class="mb-4" />


                <form method="POST" action="{{ route('two-factor.login') }}">
                    @csrf

                   
                    <div class="form-group" x-show="! recovery">

                        <label class="login-label" for="code">
                            {{ __('Code') }}
                        </label>

                        <input
                            id="code"
                            class="login-input"
                            type="text"
                            inputmode="numeric"
                            name="code"
                            autofocus
                            x-ref="code"
                            autocomplete="one-time-code"
                        >

                    </div>


                   
                    <div class="form-group" x-cloak x-show="recovery">

                        <label class="login-label" for="recovery_code">
                            {{ __('Recovery Code') }}
                        </label>

                        <input
                            id="recovery_code"
                            class="login-input"
                            type="text"
                            name="recovery_code"
                            x-ref="recovery_code"
                            autocomplete="one-time-code"
                        >

                    </div>


                    <div>

                  
                        <button type="submit" class="login-btn">
                            {{ __('Log in') }}
                        </button>


                        
                        <button
                            type="button"
                            class="two-factor-link"
                            x-show="! recovery"
                            x-on:click="
                                recovery = true;
                                $nextTick(() => { $refs.recovery_code.focus() })
                            "
                        >
                            {{ __('Use a recovery code') }}
                        </button>


                        
                        <button
                            type="button"
                            class="two-factor-link"
                            x-cloak
                            x-show="recovery"
                            x-on:click="
                                recovery = false;
                                $nextTick(() => { $refs.code.focus() })
                            "
                        >
                            {{ __('Use an authentication code') }}
                        </button>

                    </div>

                </form>

            </div>


            <div class="login-divider">
                <span style="background:#006937;"></span>
                <span style="background:#f7be00;"></span>
                <span style="background:#ae1410;"></span>
            </div>

        </div>

    </div>

@endsection
@extends('components.layouts.app.misepg')

@section('content')

    <style>
        body {
            background: #f0f4f0;
        }

        .form-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 90px 20px 50px;
            font-family: 'Montserrat', 'Segoe UI', sans-serif;
        }

        .form-card {
            background: #fff;
            width: 100%;
            max-width: 580px;
            border-radius: 16px;
            border: 2px solid #006937;
            box-shadow: 0 10px 30px rgba(0, 105, 55, 0.08);
            overflow: hidden;
        }

        .form-header {
            background: linear-gradient(160deg, #004d28 0%, #006937 100%);
            padding: 34px 44px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .form-header::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.05) 0%, transparent 70%);
            top: -100px;
            right: -60px;
            pointer-events: none;
        }

        .form-header h2 {
            color: #fff;
            font-size: 22px;
            font-weight: 800;
            margin: 0;
            position: relative;
            z-index: 1;
            letter-spacing: 0.2px;
        }

        .form-header p {
            color: rgba(255, 255, 255, 0.65);
            font-size: 13px;
            margin: 8px 0 0;
            position: relative;
            z-index: 1;
        }

        .form-body {
            padding: 38px 44px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 12.5px;
            font-weight: 700;
            color: #006937;
            margin-bottom: 7px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 11px 14px;
            border: 2px solid #a3bfa7 ;
            border-radius: 8px;
            font-size: 14px;
            color: #1e293b;
            background: #fcfdfc;
            transition: border-color 0.2s, background 0.2s, box-shadow 0.2s;
            box-sizing: border-box;
            font-family: 'Montserrat', 'Segoe UI', sans-serif;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #006937 ;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(0, 105, 55, 0.2);
        }

        .form-group input[readonly],
        .form-group select[disabled] {
            background: #f1f5f1;
            color: #6b7280;
            cursor: not-allowed;
            border-color: #e5e7eb;
        }

        .form-group textarea {
            height: 110px;
            resize: none;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(160deg, #004d28 0%, #006937 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 10px;
            transition: transform 0.15s, box-shadow 0.15s;
            letter-spacing: 0.4px;
            font-family: 'Montserrat', 'Segoe UI', sans-serif;
            box-shadow: 0 4px 16px rgba(0, 105, 55, 0.25);
        }

        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 22px rgba(0, 105, 55, 0.35);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .alert-success {
            background: #dcfce7;
            color: #15803d;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 22px;
            font-size: 14px;
            border-left: 4px solid #16a34a;
            font-weight: 500;
        }

        .alert-error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 22px;
            font-size: 14px;
            border-left: 4px solid #dc2626;
        }

        @media (max-width: 540px) {
            .form-body {
                padding: 26px 22px;
            }

            .form-header {
                padding: 26px 22px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="form-page">
        <div class="form-card">
            <div class="form-header">
                <h2>Demande de Maintenance</h2>
                <p>Remplissez le formulaire ci-dessous pour soumettre votre demande</p>
            </div>

            <div class="form-body">
                @php $client = auth()->check() ? auth()->user()->client : null; @endphp

                @if (session('success'))
                    <div class="alert-success">
                        <i class="fa fa-check-circle"></i>&nbsp; {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert-error">
                        <ul style="margin: 0; padding-left: 18px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <script>
                    setTimeout(() => {
                        document.querySelectorAll('.alert-success, .alert-error').forEach(el => {
                            el.style.transition = 'opacity 0.5s ease';
                            el.style.opacity = '0';
                            setTimeout(() => el.remove(), 500);
                        });
                    }, 60000);
                </script>

                <form action="{{ route('formulaire_demande.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="nom_complet">Nom complet / Entreprise</label>
                        <input type="text" id="nom_complet" name="nom_complet"
                            placeholder="Votre nom ou le nom de votre entreprise" required
                            value="{{ old('nom_complet', auth()->check() ? auth()->user()->name : '') }}"
                            {{ auth()->check() ? 'readonly' : '' }}>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="telephone">Téléphone</label>
                            <input type="tel" id="telephone" name="telephone" placeholder="Ex : 06 000 0000"
                                value="{{ old('telephone', auth()->check() ? auth()->user()->phone : '') }}"
                                {{ auth()->check() ? 'readonly' : '' }}>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Entrez une adresse mail valide"
                            value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}"
                            {{ auth()->check() ? 'readonly' : '' }}>
                    </div>

                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" id="adresse" name="adresse" placeholder="Votre adresse complète"
                            value="{{ old('adresse', auth()->check() ? $client->adresse ?? '' : '') }}"
                            {{ auth()->check() && !auth()->user()->hasRole('administrateur') ? 'readonly' : '' }}>
                    </div>

                    <div class="form-group">
                        <label for="type_clients">Type de client</label>
                        <select id="type_clients" name="type_clients" required
                            {{ auth()->check() && !auth()->user()->hasRole('administrateur') ? 'disabled' : '' }}>
                            <option value="">-- Sélectionnez un type --</option>
                            <option value="Particuliers"
                                {{ old('type_clients', $client->type_clients ?? '') == 'Particuliers' ? 'selected' : '' }}>
                                Particulier
                            </option>
                            <option value="Entreprises"
                                {{ old('type_clients', $client->type_clients ?? '') == 'Entreprises' ? 'selected' : '' }}>
                                Entreprise
                            </option>
                        </select>
                        @if (auth()->check() && !auth()->user()->hasRole('administrateur'))
                            <input type="hidden" name="type_clients" value="{{ $client->type_clients ?? '' }}">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="objet">Objet de la demande</label>
                        <input type="text" id="objet" name="objet"
                            placeholder="Ex : Panne ordinateur, imprimante HS..." value="{{ old('objet') }}">
                    </div>

                    <div class="form-group">
                        <label for="panne">Description du problème</label>
                        <textarea id="panne" name="panne" placeholder="Décrivez votre problème en détail..." required>{{ old('panne') }}</textarea>
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="fa fa-paper-plane"></i> Soumettre la demande
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const form = document.querySelector('form');
        const btn = form.querySelector('.btn-submit');

        form.addEventListener('submit', function() {
            if (btn.disabled) return false;

            btn.disabled = true;
            btn.style.opacity = '0.5';
        });
    </script>
@endsection

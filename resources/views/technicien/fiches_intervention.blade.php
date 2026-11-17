<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 30px 0;
        color: #000;
        background: #f5f5f5;
    }

    .fiche-container {
        width: 794px;
        background: #ffffff;
        margin: auto;
        padding: 40px;
        border: 1px solid #ccc;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
    }

    .fiche-logos {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo-left,
    .logo-right {
        width: 100px;
        height: auto;
        margin-bottom: 50px;
    }

    .header-center {
        flex: 1;
        text-align: center;
    }

    .header-center h4 {
        margin: 3px 0;
        font-size: 14px;
        font-weight: bold;
        color: #000;
    }

    .input-line,
    .full-line,
    textarea,
    input[type="text"],
    input[type="date"],
    input[type="time"] {
        width: 100%;
        padding: 8px 10px;
        margin-top: 6px;
        border: 1px solid #000;
        background: #f2f5fc;
        border-radius: 6px;
        font-size: 15px;
        color: #000;
    }



    textarea {
        resize: vertical;
        height: 120px;
    }

    .input-line:focus,
    .full-line:focus,
    textarea:focus,
    input[type="text"]:focus,
    input[type="date"]:focus,
    input[type="time"]:focus {
        outline: none;
        border-color: #000;
        background: #f2f5fc;
        box-shadow: none;
    }

    input.is-invalid,
    textarea.is-invalid {
        border-color: red;
    }

    .field-error {
        color: red;
        font-size: 12px;
        margin-top: 4px;
        display: block;
    }

    .intervention-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 25px;
        font-size: 15px;
    }

    .intervention-table th,
    .intervention-table td {
        border: 1px solid #000;
        padding: 10px;
        vertical-align: top;
    }

    .form-actions {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 20px;
    }

    .btn {
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        color: #fff;
        font-size: 14px;
    }

    .save {
        background: #006937;
    }

    .edit {
        background: #e67e22;
    }

    @media print {

        body {
            background: none;
            padding: 0;
            margin: 0;
        }

        @page {
            size: A4 portrait;
            margin: 12mm;
        }

        .fiche-container {
            box-shadow: none;
            border: none;
            width: auto;
            padding: 0;
            margin: 0;
        }

        * {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .form-actions {
            display: none;
        }

        .no-print {
            display: none;
        }

        .field-error {
            display: none;
        }


        input[type="date"] {
            background: transparent;
            border: none;
            border-radius: 0;
            padding: 5px 0;
            font-size: 12px;
            font-family: Arial, sans-serif;
            width: auto;
            box-sizing: border-box;
            -webkit-appearance: none;
            appearance: none;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            display: none;
        }


        input[type="text"],
        input[type="date"],
        input.input-line {
            background: #ffffff;
            color: #000000;
            border: 1px solid #999;
            border-radius: 4px;
            padding: 5px 7px;
            font-size: 12px;
            font-family: Arial, sans-serif;
            width: 100%;
            box-sizing: border-box;
        }


        input.full-line {
            background: transparent;
            border: none;
            border-radius: 0;
            padding: 5px 0;
            font-size: 12px;
            font-family: Arial, sans-serif;
        }


        textarea {
            background: transparent;
            color: #000000;
            border: none;
            border-radius: 0;
            padding: 5px 0;
            font-size: 12px;
            font-family: Arial, sans-serif;
            width: 100%;
            box-sizing: border-box;
            height: 65px;
            overflow: visible;
            resize: none;
        }

        .header-center h4 {
            font-size: 11px;
            margin: 2px 0;
        }

        .logo-left,
        .logo-right {
            width: 65px;
            height: auto;
            margin-bottom: 10px;
        }

        .intervention-table {
            margin-top: 10px;
            font-size: 12px;
        }

        .intervention-table th,
        .intervention-table td {
            padding: 5px 7px;
        }

        .intervention-table tr {
            page-break-inside: avoid;
        }

        .fiche-logos {
            page-break-inside: avoid;
            margin-bottom: 5px;
        }

        p strong {
            font-weight: 600;
            font-size: 13px;
        }

        .footer-info {
            page-break-inside: avoid;
            white-space: nowrap;
            font-size: 10px;
            margin-top: 8px;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    }
</style>

<form method="POST" action="{{ route('technicien.fiche_intervention.store', ['demande_id' => $demande->id]) }}">
    @csrf
    <div class="fiche-container">

        @if (session('success'))
            <div class="no-print"
                style="
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 12px 20px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="no-print"
                style="
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 12px 20px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;">
                {{ session('error') }}
            </div>
        @endif

        <div class="fiche-logos">
            <img src="{{ asset('images/logo.png') }}" class="logo-left">

            <div class="header-center">
                <h4>REPUBLIQUE DU CONGO</h4>
                <h4>MINISTÈRE DES FINANCES, DU BUDGET </h4>
                <h4>ET DU PORTEFEUILLE PUBLIC</h4>
                <h4>AGENCE CONGOLAISE DES SYSTÈMES D'INFORMATION</h4>
                <h4>DIRECTION DEPARTEMENTALE</h4>
                <hr style="border: none; height: 1px; background-color: #555; margin: 4px 0;">
                <h4>FICHE D'INTERVENTION TRAVAUX DE MAINTENANCE</h4>
                <h4>CLIENT PARTICULIER</h4>
            </div>

            <img src="{{ asset('images/logo_mf.png') }}" class="logo-right">
        </div>

        <br><br>

        <p style="font-weight: normal; font-size: 14px;">
            <strong style="font-weight: 600;">CLIENT :</strong>
            <input type="text" class="input-line" value="{{ $demande->nom_complet ?? '' }}" readonly>
        </p>

        <p style="font-weight: normal; font-size: 14px;">
            <strong style="font-weight: 600;">DATE D'ARRIVEE :</strong>
            <input type="date" name="date_arrivee" value="{{ old('date_arrivee', $fiche?->date_arrivee ?? '') }}"
                class="input-line {{ $errors->has('date_arrivee') ? 'is-invalid' : '' }}" style="width:30%;">
            @error('date_arrivee')
                <span class="field-error">{{ $message }}</span>
            @enderror
        </p>

        <p style="font-weight: normal; font-size: 14px;">
            <strong style="font-weight: 600;">DATE DE SORTIE :</strong>
            <input type="date" name="date_sortie" value="{{ old('date_sortie', $fiche?->date_sortie ?? '') }}"
                class="input-line {{ $errors->has('date_sortie') ? 'is-invalid' : '' }}" style="width:30%;">
            @error('date_sortie')
                <span class="field-error">{{ $message }}</span>
            @enderror
        </p>

        <table class="intervention-table">

            <tr>
                <th width="50%">MOTIF DE L'INTERVENTION</th>
                <th width="50%">TECHNICIEN(S)</th>
            </tr>

            <tr>
                <td>
                    <textarea name="motif_intervention" class="{{ $errors->has('motif_intervention') ? 'is-invalid' : '' }}"
                        style="resize:none; height:180px">{{ old('motif_intervention', $fiche?->motif_intervention ?? '') }}</textarea>
                    @error('motif_intervention')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </td>
                <td>
                    <strong>Nom(s) :</strong><br><br>

                    @php
                        $techniciens = [
                            'NDONDELET BAYAMBIDIKA Armel Fabrice',
                            'AKOUALA ANGHA Hermann Recherchey',
                            "OTTO NGOUEM'BONZE Chancel Juscard",
                            'BELIMBA Marck Gabrielle',
                        ];
                        $technicienActuel = old('technicien_nom', $fiche?->Technicien_Nom ?? '');
                    @endphp

                    <select name="technicien_nom"
                        class="input-line {{ $errors->has('technicien_nom') ? 'is-invalid' : '' }}">
                        <option value="">-- Sélectionner un technicien --</option>

                        @if ($technicienActuel !== '' && !in_array($technicienActuel, $techniciens))
                            <option value="{{ $technicienActuel }}" selected>{{ $technicienActuel }}</option>
                        @endif

                        @foreach ($techniciens as $tech)
                            <option value="{{ $tech }}" {{ $technicienActuel == $tech ? 'selected' : '' }}>
                                {{ $tech }}
                            </option>
                        @endforeach
                    </select>

                    @error('technicien_nom')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </td>
            </tr>

            <tr>
                <th colspan="2" style="text-align:center;">Compte rendu de l'intervention</th>
            </tr>

            <tr>
                <td colspan="2">
                    <textarea name="Compte_rendues_Intervention"
                        class="{{ $errors->has('Compte_rendues_Intervention') ? 'is-invalid' : '' }}" style="height:150px; resize: none;">{{ old('Compte_rendues_Intervention', $fiche?->Compte_rendues_Intervention ?? '') }}</textarea>
                    @error('Compte_rendues_Intervention')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </td>
            </tr>

            <tr>
                <th colspan="2" style="text-align:left;">Proposition du montant à payer :</th>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="text" name="Proposition_Montant"
                        value="{{ old('Proposition_Montant', $fiche?->Proposition_Montant ?? '') }}"
                        class="full-line {{ $errors->has('Proposition_Montant') ? 'is-invalid' : '' }}">
                    @error('Proposition_Montant')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </td>
            </tr>

            <tr>
                <th>Nom et signature du commercial</th>
                <th>Nom et signature du technicien</th>
            </tr>

            <tr>
                <td style="height:120px;"></td>
                <td style="height:120px;"></td>
            </tr>

        </table>

        <br>

        <div class="footer-info" style="margin-top: 15px;">
            Brazzaville : 04 444 87 31 - STD
            <br>
            <br>
            Pointe-Noire : 04 444 07 25 STD
            06 611 48 51 - SFBMC
        </div>

        <div class="form-actions">
            <button type="submit" class="btn save">Enregistrer</button>

            @if ($fiche && $fiche->statut === 'completee')
                <button type="button" class="btn edit" onclick="imprimerFiche()">Télécharger</button>
            @endif
        </div>

    </div>
</form>

<script>
    function imprimerFiche() {
        window.print();
    }
</script>

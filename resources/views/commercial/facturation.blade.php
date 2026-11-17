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
        color: #000;
    }

    .fiche-logos {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
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
    .input-date,
    .full-line,
    textarea,
    input[type="text"],
    input[type="number"],
    input[type="date"] {
        width: 100%;
        padding: 8px 10px;
        margin-top: 6px;
        border: 1px solid #000;
        background: #f2f5fc;
        border-radius: 6px;
        font-size: 15px;
        color: #000;
        font-family: Arial, sans-serif;
        box-sizing: border-box;
    }

    textarea {
        resize: none;
        height: 120px;
    }

    .demande-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 25px;
        font-size: 15px;
    }

    .demande-table th,
    .demande-table td {
        border: 1px solid #000;
        padding: 10px;
        vertical-align: top;
    }

    .demande-table textarea,
    .demande-table input {
        border: none;
        background: transparent;
        padding: 0;
        margin: 0;
        box-shadow: none;
    }

    label,
    strong {
        color: #000;
        font-weight: bold;
    }

    .footer-grid {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-top: 30px;
        align-items: flex-start;
        font-size: 14px;
        line-height: 1.5;
    }

    .footer-left,
    .footer-right {
        flex: 1;
        box-sizing: border-box;
    }

    .footer-left {
        text-align: left;
        margin-right: 10px;
    }

    .footer-right {
        text-align: right;
        margin-left: 10px;
    }

    .alert {
        width: 794px;
        margin: 0 auto 20px auto;
        padding: 12px 20px;
        border-radius: 6px;
        font-size: 14px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .alert ul {
        margin: 0;
        padding-left: 18px;
    }

    .form-actions {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 30px;
    }

    .btn {
        border: none;
        padding: 10px 30px;
        border-radius: 6px;
        cursor: pointer;
        color: #fff;
        font-size: 16px;
    }

    .btn-save {
        background: #006937;
    }

    .btn-download {
        background: #e67e22;
    }

    @media print {
        body {
            background: white;
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

        .alert,
        .form-actions,
        .no-print {
            display: none;
        }

        input,
        textarea,
        input[type="text"],
        input[type="number"],
        input[type="date"] {
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

        .demande-table textarea,
        .demande-table input {
            border: none;
            padding: 0;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            display: none;
        }

        input[type="date"] {
            -webkit-appearance: none;
            appearance: none;
            position: relative;
            color: transparent;
        }

        input[type="date"]::after {
            content: attr(value);
            position: absolute;
            left: 7px;
            top: 4px;
            color: #000;
            font-size: 12px;
        }

        textarea {
            height: 80px;
            overflow: visible;
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

        .demande-table {
            margin-top: 10px;
            font-size: 12px;
        }

        .demande-table th,
        .demande-table td {
            padding: 5px 7px;
        }

        .demande-table tr {
            page-break-inside: avoid;
        }

        .fiche-logos {
            page-break-inside: avoid;
            margin-bottom: 5px;
        }

        .footer-grid {
            font-size: 11px;
        }
    }
</style>


@if (session('success'))
    <div class="alert alert-success no-print">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="alert alert-error no-print">{{ session('error') }}</div>
@endif


<div class="fiche-container">

    <div class="fiche-logos">
        <img src="{{ asset('images/logo.png') }}" class="logo-left">
        <div class="header-center">
            <h4>REPUBLIQUE DU CONGO</h4>
            <h4>MINISTÈRE DES FINANCES, DU BUDGET</h4>
            <h4>ET DU PORTEFEUILLE PUBLIC</h4>
            <h4>AGENCE CONGOLAISE DES SYSTÈMES D'INFORMATION</h4>
            <h4>DIRECTION DEPARTEMENTALE</h4>
            <hr style="border: none; height: 1px; background-color: black;">
        </div>
        <img src="{{ asset('images/logo_mf.png') }}" class="logo-right">
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <form method="POST"
        action="{{ $facture
            ? route('commercial.facturation.update', $facture)
            : route('commercial.facturation.store', $demande->id) }}">
        @csrf
        @if ($facture)
            @method('PUT')
        @endif

        <input type="hidden" name="demande_id" value="{{ $demande->id }}">

        <div style="display:flex; flex-direction:column; gap:12px; max-width:500px;">

            <div>
                <strong>FACTURE N°</strong>
                <input type="number" value="{{ $demande->id }}" readonly class="input-line">
                <input type="hidden" name="Numéro" value="{{ $demande->id }}">
            </div>

            <div>
                <strong>Date</strong>
                <input type="date" name="Date" class="input-date" value="{{ old('Date', $facture->Date ?? '') }}">
                @error('Date')
                    <span style="color:red; font-size:13px;">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <strong>DOIT</strong>
                <input type="text" name="Doit" class="input-line"
                    value="{{ old('Doit', $facture->Doit ?? ($demande->nom_complet ?? '')) }}">
                @error('Doit')
                    <span style="color:red; font-size:13px;">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <strong>OBJET</strong>
                <input type="text" name="Objet" class="input-line"
                    value="{{ old('Objet', $facture->Objet ?? '') }}">
                @error('Objet')
                    <span style="color:red; font-size:13px;">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <table class="demande-table">
            <thead>
                <tr>
                    <th>DESIGNATION</th>
                    <th>MONTANT (FCFA)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <textarea name="Designation">{{ old('Designation', $facture->Designation ?? '') }}</textarea>
                        @error('Designation')
                            <span style="color:red; font-size:13px;">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <textarea name="Montant" id="montant" placeholder="Veuillez saisir un montant par ligne">{{ old('Montant', $facture->Montant ?? ($ficheIntervention->Proposition_Montant ?? '')) }}</textarea>
                        @error('Montant')
                            <span style="color:red; font-size:13px;">{{ $message }}</span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th style="text-align:right;">TOTAL</th>
                    <th>

                        <input type="text" id="total" class="full-line" readonly
                            value="{{ old('Total', $facture->Total ?? '') }}">
                    </th>
                </tr>
            </tbody>
        </table>

        <p><strong>Arrêté la présente facture à la somme de :</strong></p>

        <input type="text" id="total_lettres" class="full-line" readonly
            value="{{ old('Total_lettres', $facture->Total_lettres ?? '') }}">

        <br>
        <br>
        <br>

        <div class="footer-grid">
            <div class="footer-left">
                <strong>Direction Générale</strong>
                <p> 16 rue Laptot Matouffa Mpila</p>
                Centre-ville, Brazzaville
            </div>
            <div class="footer-right">
                <strong>Pointe-Noire</strong>
                Mpita derrière Brasco
                Pointe-Noire
                <p>Tél : (+242) 611 48 51 / (+242) 04 415 48 71</p>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-save">Enregistrer</button>

            @if ($facture)
                <button type="button" class="btn btn-download" onclick="imprimerFacture()">
                    Télécharger
                </button>
            @endif
        </div>

    </form>
</div>

<script>
    var UNITES = ['zéro', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf',
        'dix', 'onze', 'douze', 'treize', 'quatorze', 'quinze', 'seize'
    ];
    var DIZAINES = ['', '', 'vingt', 'trente', 'quarante', 'cinquante', 'soixante'];


    function moinsDeCent(n, final) {
        if (n < 17) return UNITES[n];
        if (n < 20) return 'dix-' + UNITES[n - 10];
        if (n < 70) {
            var d = Math.floor(n / 10),
                u = n % 10;
            if (u === 0) return DIZAINES[d];
            if (u === 1) return DIZAINES[d] + ' et un';
            return DIZAINES[d] + '-' + UNITES[u];
        }
        if (n < 80) {
            if (n === 71) return 'soixante et onze';
            return 'soixante-' + moinsDeCent(n - 60, final);
        }
        if (n === 80) return final ? 'quatre-vingts' : 'quatre-vingt';
        return 'quatre-vingt-' + moinsDeCent(n - 80, final);
    }


    function moinsDeMille(n, final) {
        var c = Math.floor(n / 100),
            r = n % 100;
        if (c === 0) return moinsDeCent(r, final);
        var texte = (c === 1) ? 'cent' : UNITES[c] + ' cent';
        if (r === 0) return (c > 1 && final) ? texte + 's' : texte;
        return texte + ' ' + moinsDeCent(r, final);
    }

    function nombreEnLettres(n) {
        var millions = Math.floor(n / 1000000) % 1000;
        var milliers = Math.floor(n / 1000) % 1000;
        var reste = n % 1000;
        var parties = [];

        if (millions > 0) {
            parties.push(moinsDeMille(millions, true) + ' million' + (millions > 1 ? 's' : ''));
        }
        if (milliers > 0) {
            parties.push(milliers === 1 ? 'mille' : moinsDeMille(milliers, false) + ' mille');
        }
        if (reste > 0) {
            parties.push(moinsDeMille(reste, true));
        }
        return parties.join(' ');
    }

    function mettreAJourTotal() {
        var lignes = document.getElementById('montant').value.split('\n');
        var total = 0;

        lignes.forEach(function(ligne) {
            var chiffres = ligne.replace(/[^0-9]/g, '');
            if (chiffres !== '') {
                total += parseInt(chiffres, 10);
            }
        });

        var champTotal = document.getElementById('total');
        var champLettres = document.getElementById('total_lettres');

        if (total <= 0 || total >= 1000000000) {
            champTotal.value = '';
            champLettres.value = '';
            return;
        }

        var texte = nombreEnLettres(total);
        texte = texte.charAt(0).toUpperCase() + texte.slice(1);
        var de = (total % 1000000 === 0) ? ' de' : '';

        champTotal.value = total;
        champLettres.value = texte + de + ' francs CFA';
    }

    document.getElementById('montant').addEventListener('input', mettreAJourTotal);
    document.addEventListener('DOMContentLoaded', mettreAJourTotal);

    function imprimerFacture() {
        var dateInput = document.querySelector('input[name="Date"]');
        if (dateInput) {
            dateInput.setAttribute('value', dateInput.value);
        }
        window.print();
    }
</script>

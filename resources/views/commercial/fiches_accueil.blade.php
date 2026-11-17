<style>
    input[readonly],
    textarea[readonly] {
        background: #e9ecef;
        color: #6c757d;
        cursor: not-allowed;
        border-color: #ced4da;
    }

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 30px 0;
        background: #f5f5f5;
    }

    .fiche-container {
        width: 794px;
        background: #fff;
        margin: auto;
        padding: 40px;
        border: 1px solid #ccc;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
    }

    .fiche-logos {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo-left,
    .logo-right {
        width: 100px;
        margin-bottom: 30px;
    }

    .header-center {
        flex: 1;
        text-align: center;
    }

    .header-center h4,
    .header-center h5 {
        margin: 3px 0;
        font-size: 14px;
        font-weight: bold;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-row {
        display: flex;
        gap: 15px;
    }

    .form-row .form-group {
        flex: 1;
    }

    label {
        font-weight: bold;
    }

    input,
    textarea {
        width: 100%;
        padding: 8px 10px;
        margin-top: 5px;
        border: 1px solid #000;
        background: #f2f5fc;
        border-radius: 6px;
        font-size: 14px;
    }

    textarea {
        height: 120px;
        resize: none;
    }

    .field-error {
        color: red;
        font-size: 12px;
        margin-top: 4px;
        display: block;
    }

    input.is-invalid,
    textarea.is-invalid {
        border-color: red;
    }

    .signatures {
        display: flex;
        justify-content: space-between;
        margin-top: 50px;
        margin-bottom: 60px;
        text-align: center;
    }

    .signatures div {
        width: 32%;
        padding-top: 40px;
    }

    .signatures span {
        font-size: 12px;
        color: #555;
    }

    .form-actions {
        display: flex;
        justify-content: center;
        gap: 15px;
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
        background: #3498db;
    }

    .send {
        background: #e67e22;
    }

    .signatures {
        display: none;
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

        input,
        textarea,
        input[readonly],
        textarea[readonly] {
            background: #ffffff;
            color: #000000;
            border: 1px solid #999;
            border-radius: 4px;
            padding: 5px 7px;
            font-size: 12px;
            font-family: Arial, sans-serif;
            width: 100%;
            box-sizing: border-box;
            cursor: default;
        }

        textarea,
        textarea[readonly] {
            height: 65px;
        }

        label {
            font-size: 12px;
            font-weight: bold;
            color: #000;
        }

        .form-group {
            margin-bottom: 8px;
        }

        .header-center h4,
        .header-center h5 {
            font-size: 11px;
            margin: 2px 0;
        }

        .logo-left,
        .logo-right {
            width: 65px;
            height: auto;
        }

        .signatures {
            display: flex;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .signatures div {
            padding-top: 25px;
        }

        .signatures strong {
            font-size: 12px;
        }

        .signatures span {
            font-size: 11px;
        }

        .field-error {
            display: none;
        }
 
        @media print {
            .no-print {
                display: none ;
            }
        }
    }
</style>


@if (session('success'))
    <div
    class="no-print"
    style="
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    padding: 12px 20px;
    border-radius: 6px;
    font-size: 14px;
    width: 794px;
    margin: 0 auto 20px auto;
   
">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div
    class="no-print"
    style="
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
    padding: 12px 20px;
    border-radius: 6px;
    font-size: 14px;
    width: 794px;
    margin: 0 auto 20px auto;
    
">
        {{ session('error') }}
    </div>
@endif



<form method="POST"
    action="{{ auth()->user()->hasRole('technicien')
        ? route('technicien.fiches_accueil.update', $fiche)
        : ($fiche
            ? route('commercial.fiches_accueil.update', $fiche)
            : route('commercial.fiches_accueil.store', $demande->id)) }}">

    @csrf
    @if ($fiche || auth()->user()->hasRole('technicien'))
        @method('PUT')
    @endif

    <div class="fiche-container">

        <div class="fiche-logos">
            <img src="{{ asset('images/logo.png') }}" class="logo-left">

            <div class="header-center">
                <h4>REPUBLIQUE DU CONGO</h4>
                <h4>MINISTÈRE DES FINANCES</h4>
                <h4>AGENCE CONGOLAISE DES SYSTÈMES D'INFORMATION</h4>
                <h4>DIRECTION DEPARTEMENTALE</h4>
                <hr style="border:none;height:1px;background-color:#000;margin:4px 0;">
                <h5>FICHE D'ACCUEIL CLIENT PARTICULIER</h5>
                <h5>TRAVAUX DE MAINTENANCE</h5>
            </div>

            <img src="{{ asset('images/logo_mf.png') }}" class="logo-right">
        </div>

        <br>
        <br>
        <br>
        <br>
 
        <div class="form-row">
            <div class="form-group">
                <label>N°</label>
                <input type="number" value="{{ $demande->id ?? '' }}" readonly>
            </div>
        </div>

        <div class="form-group">
            <label>Date</label>
            <input type="date" value="{{ optional($demande)->created_at?->format('Y-m-d') }}" readonly>
        </div>

        <div class="form-group">
            <label>Heure</label>
            <input type="time" value="{{ optional($demande)->created_at?->format('H:i') }}" readonly>
        </div>

        <div class="form-group">
            <label>Nom du client</label>
            <input type="text" value="{{ $demande->nom_complet ?? '' }}" readonly>
        </div>

        <div class="form-group">
            <label>Téléphone</label>
            <input type="text" value="{{ $demande->telephone ?? '' }}" readonly>
        </div>

        <div class="form-group">
            <label>Type de machines</label>
            <input type="text" name="type_machine" value="{{ old('type_machine', $fiche->type_machine ?? '') }}"
                class="{{ $errors->has('type_machine') ? 'is-invalid' : '' }}"
                @if (auth()->user()->hasRole('technicien')) readonly @endif>
            @error('type_machine')
                <span class="field-error">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group">
            <label>Accessoires</label>
            <input type="text" name="accessoires" value="{{ old('accessoires', $fiche->accessoires ?? '') }}"
                class="{{ $errors->has('accessoires') ? 'is-invalid' : '' }}"
                @if (auth()->user()->hasRole('technicien')) readonly @endif>
            @error('accessoires')
                <span class="field-error">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group">
            <label>Informations commercial</label>
            <textarea name="informations_commercial" class="{{ $errors->has('informations_commercial') ? 'is-invalid' : '' }}"
                @if (auth()->user()->hasRole('technicien')) readonly @endif>{{ old('informations_commercial', $fiche->informations_commerciale ?? '') }}</textarea>
            @error('informations_commercial')
                <span class="field-error">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group">
            <label>Informations technicien</label>
            <textarea name="informations_technicien" class="{{ $errors->has('informations_technicien') ? 'is-invalid' : '' }}"
                @if (auth()->user()->hasRole('commerciale')) readonly @endif>{{ old('informations_technicien', $fiche->informations_technicien ?? '') }}</textarea>
            @error('informations_technicien')
                <span class="field-error">{{ $message }}</span>
            @enderror
        </div>


        <div class="signatures">
            <div>
                <strong>Agent commercial</strong><br>
                <span>Nom & Signature</span>
            </div>
            <div>
                <strong>Client</strong><br>
                <span>Signature</span>
            </div>
            <div>
                <strong>Technicien</strong><br>
                <span>Nom & Signature</span>
            </div>
        </div>


        <div class="form-actions">
            <button type="submit" class="btn save">Enregistrer</button>

            @if ($fiche && $fiche->informations_technicien && $fiche->informations_commerciale)
                <button type="button" class="btn send" onclick="imprimerFiche()">Télécharger</button>
            @endif
        </div>

    </div>
</form>

<script>
    function imprimerFiche() {
        window.print();
    }
</script>

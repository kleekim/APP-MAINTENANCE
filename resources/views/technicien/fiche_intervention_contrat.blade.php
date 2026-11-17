<style>
    textarea {
        resize: none;
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
        margin: 40px auto;
        padding: 30px;
        border: 1px solid #ccc;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.15);
        box-sizing: border-box;
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

    .header-center h4,
    .header-center h5 {
        margin: 3px 0;
        font-size: 14px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    input[type="time"],
    textarea {
        width: 100%;
        padding: 6px 8px;
        margin-top: 6px;
        border: 1px solid #000;
        background: #fff;
        border-radius: 4px;
        font-size: 14px;
        color: #000;
        box-sizing: border-box;
    }

    textarea {
        height: 100px;
    }

    input[readonly],
    textarea[readonly] {
        background: #fff;
        color: #000;
        cursor: not-allowed;
    }

    .input-error {
        border: 2px solid red ;
        background: #fff5f5 ;
    }

    .demande-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 18px;
        font-size: 14px;
    }

    .demande-table th,
    .demande-table td {
        border: 1px solid #000;
        padding: 8px;
        vertical-align: top;
    }

    .demande-table th {
        background: #efefef;
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
        font-size: 14px;
        font-weight: 500;
        transition: opacity 0.2s;
    }

    .btn:hover {
        opacity: 0.9;
    }

    .btn:active {
        transform: scale(0.97);
    }

    .btn-save {
        background: #006937;
        color: #fff;
    }

    .btn-edit {
        background: #fff;
        color: #374151;
        border: 1px solid #d1d5db ;
    }

    .btn-edit:hover {
        background: #f9fafb;
        opacity: 1;
    }

    .btn-print {
        background: #006937;
        color: #fff;
    }

    @media print {

        @page {
            size: A4 portrait;
            margin: 10mm 8mm;
        }

        html,
        body {
            margin: 0 ;
            padding: 0 ;
            background: #fff ;
            width: 100% ;
        }

        .form-actions,
        .success-message,
        .error-message {
            display: none ;
        }

        .fiche-container {
            width: 100% ;
            max-width: 100% ;
            margin: 0 ;
            padding: 0 ;
            box-shadow: none ;
            border: none ;
            box-sizing: border-box ;
        }

        .fiche-logos {
            margin-bottom: 4px;
        }

        .logo-left,
        .logo-right {
            width: 50px ;
            height: 50px;
            object-fit: contain ;
            margin-bottom: 0;
        }

        .header-center h4,
        .header-center h5 {
            font-size: 9.5px ;
            margin: 1px 0 ;
        }

        hr {
            margin: 2px 0 ;
        }

        .demande-table {
            width: 100% ;
            font-size: 10px ;
            table-layout: fixed ;
            border-collapse: collapse ;
        }

        .demande-table th,
        .demande-table td {
            padding: 4px 5px ;
            border: 1px solid #000 ;
            vertical-align: top ;
            word-wrap: break-word ;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        textarea {
            font-size: 9.5px ;
            padding: 1px 2px ;
            border: none ;
            background: transparent ;
            outline: none ;
            box-shadow: none ;
            width: 100% ;
            box-sizing: border-box ;
            margin-top: 2px ;
        }

        textarea {
            overflow: visible ;
            white-space: pre-wrap ;
            word-break: break-word ;
            display: block ;
            resize: none ;
        }

        table,
        tr,
        td,
        th {
            page-break-inside: avoid ;
        }

        * {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        @media print {
            .no-print {
                display: none ;
            }
        }
    }
</style>


@if (session('success'))
    <div class="success-message"
        style="background:#d4edda; color:#155724; border:1px solid #c3e6cb;
        padding:12px 20px; border-radius:6px; font-size:14px; width:794px;
        margin: 0 auto 20px auto; ">
        {{ session('success') }}
    </div>
@endif


@if ($errors->any())
    <div class="error-message"
        style="background:#f8d7da; color:#721c24; border:1px solid #f5c6cb;
         padding:12px 20px; border-radius:6px; font-size:14px; width:794px;
        margin: 0 auto 20px auto;">
        <ul style="margin:10px 0 0 18px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST"
    action="{{ $fiche
        ? route('technicien.fiche_intervention_contrat.update', $client->id)
        : route('technicien.fiche_intervention_contrat.store', $client->id) }}">
    @csrf

    <div class="fiche-container">

        <div class="fiche-logos">
            <img src="{{ asset('images/logo.png') }}" class="logo-left">
            <div class="header-center">
                <h4>REPUBLIQUE DU CONGO</h4>
                <h4>MINISTÈRE DES FINANCES, DU BUDGET ET DU PORTEFEUILLE PUBLIC</h4>
                <h4>AGENCE CONGOLAISE DES SYSTÈMES D'INFORMATION</h4>
                <h4>DIRECTION DEPARTEMENTALE</h4>
                <hr style="border:none; height:1px; background-color:black;">
                <h5>FICHE D'INTERVENTION</h5>
            </div>
            <img src="{{ asset('images/logo_mf.png') }}" class="logo-right">
        </div>

        <br>
        <br>
        <br>

        <div style="margin-bottom:10px; width:20%;">
            <strong>Date</strong>
            <input type="date" name="date" value="{{ old('date', $fiche->date ?? '') }}"
                {{ $fiche ? 'readonly' : '' }} data-champ class="@error('date') input-error @enderror">
        </div>

        <table class="demande-table" style="table-layout:fixed;">
            <colgroup>
                <col style="width:33%;">
                <col style="width:33%;">
                <col style="width:34%;">
            </colgroup>

            <tr>
                <th>SERVICE</th>
                <th>MOTIF DU DEMANDEUR</th>
                <th>INTERVENANT(S)</th>
            </tr>

            <tr>
                <td style="padding:10px;">
                    <strong>Direction :</strong>
                    <input type="text" name="direction" value="{{ old('direction', $fiche->direction ?? '') }}"
                        {{ $fiche ? 'readonly' : '' }} data-champ style="margin-bottom:8px;"
                        class="@error('direction') input-error @enderror">

                    <strong>Service :</strong>
                    <input type="text" name="service" value="{{ old('service', $fiche->service ?? '') }}"
                        {{ $fiche ? 'readonly' : '' }} data-champ style="margin-bottom:8px;"
                        class="@error('service') input-error @enderror">

                    <strong>Date :</strong>
                    <input type="date" name="date_service"
                        value="{{ old('date_service', $fiche->date_service ?? '') }}" {{ $fiche ? 'readonly' : '' }}
                        data-champ style="margin-bottom:8px;" class="@error('date_service') input-error @enderror">

                    <strong>Heure :</strong>
                    <input type="time" name="heure" value="{{ old('heure', $fiche->heure ?? '') }}"
                        {{ $fiche ? 'readonly' : '' }} data-champ class="@error('heure') input-error @enderror">
                </td>

                <td style="padding:10px;">
                    <textarea name="motif_demandeur" style="height:250px;" {{ $fiche ? 'readonly' : '' }} data-champ
                        class="@error('motif_demandeur') input-error @enderror">{{ old('motif_demandeur', $fiche->motif_demandeur ?? '') }}</textarea>
                </td>

                <td style="padding:10px;">
                    <textarea name="intervenants" style="height:250px;" {{ $fiche ? 'readonly' : '' }} data-champ
                        class="@error('intervenants') input-error @enderror">{{ old('intervenants', $fiche->intervenants ?? '') }}</textarea>
                </td>
            </tr>

            <tr>
                <th colspan="3" style="text-align:center;">COMPTE RENDU DE L'INTERVENTION</th>
            </tr>

            <tr>
                <td colspan="3" style="padding:10px;">
                    <textarea name="compte_rendu_intervention" style="height:160px;" {{ $fiche ? 'readonly' : '' }} data-champ
                        class="@error('compte_rendu_intervention') input-error @enderror">{{ old('compte_rendu_intervention', $fiche->compte_rendu_intervention ?? '') }}</textarea>
                </td>
            </tr>
        </table>

        
        <table class="demande-table" style="table-layout:fixed; margin-top:-1px;">
            <colgroup>
                <col style="width:50%;">
                <col style="width:50%;">
            </colgroup>

            <tr>
                <th>OBSERVATION DE L'AGENT</th>
                <th>OBSERVATION DU CHEF DE SERVICE</th>
            </tr>

            <tr id="ligne-observations">
                <td id="td-obs-agent" style="padding:10px;">
                    <textarea id="ta-obs-agent" name="observation_agent" style="height:130px; width:100%; box-sizing:border-box;"
                        {{ $fiche ? 'readonly' : '' }} data-champ class="@error('observation_agent') input-error @enderror">{{ old('observation_agent', $fiche->observation_agent ?? '') }}</textarea>
                </td>

                <td id="td-obs-service" style="padding:10px;">
                    <textarea id="ta-obs-service" name="observation_service" style="height:130px; width:100%; box-sizing:border-box;"
                        {{ $fiche ? 'readonly' : '' }} data-champ class="@error('observation_service') input-error @enderror">{{ old('observation_service', $fiche->observation_service ?? '') }}</textarea>
                </td>
            </tr>
        </table>

        <div class="form-actions">
            @if (!$fiche)
                <button type="submit" class="btn btn-save">Enregistrer</button>
            @else
                <button type="button" id="btn-modifier" onclick="activerEdition()" class="btn btn-edit">
                    Modifier
                </button>
                <button type="submit" id="btn-enregistrer" class="btn btn-save" style="display:none;">
                    Enregistrer les modifications
                </button>
                <button type="button" onclick="imprimerProprement()" class="btn btn-print">
                    Télécharger
                </button>
            @endif
        </div>

    </div>
</form>

<script>
    function activerEdition() {
        document.querySelectorAll('[data-champ]').forEach(champ => {
            champ.removeAttribute('readonly');
        });
        document.getElementById('btn-modifier').style.display = 'none';
        document.getElementById('btn-enregistrer').style.display = 'inline-block';
    }

    function imprimerProprement() {

        var tdAgent = document.getElementById('td-obs-agent');
        var tdService = document.getElementById('td-obs-service');
        var taAgent = document.getElementById('ta-obs-agent');
        var taService = document.getElementById('ta-obs-service');

        tdAgent.style.height = 'auto';
        tdService.style.height = 'auto';
        taAgent.style.height = 'auto';
        taService.style.height = 'auto';

        var h = Math.max(tdAgent.offsetHeight, tdService.offsetHeight, 150);

        tdAgent.style.height = h + 'px';
        tdService.style.height = h + 'px';
        taAgent.style.height = (h - 22) + 'px';
        taService.style.height = (h - 22) + 'px';


        document.querySelectorAll('input, textarea').forEach(function(el) {
            el.style.backgroundColor = 'transparent';
            el.style.border = 'none';
            el.style.outline = 'none';
            el.style.boxShadow = 'none';
        });

        window.print();

        document.querySelectorAll('input, textarea').forEach(function(el) {
            el.style.backgroundColor = '';
            el.style.border = '';
            el.style.outline = '';
            el.style.boxShadow = '';
        });

        taAgent.style.height = '130px';
        taService.style.height = '130px';
        tdAgent.style.height = '';
        tdService.style.height = '';
    }
</script>
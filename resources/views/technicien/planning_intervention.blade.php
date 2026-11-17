<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning de Travail</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        textarea {
            resize: none;
        }

        .champ-erreur {
            border-color: #ef4444;
            background-color: #fef2f2;
        }

        /* Contour noir au focus */
        input:focus,
        textarea:focus,
        select:focus {
            outline: none ;
            border: 2px solid #000 ;
            box-shadow: none ;
            --tw-ring-shadow: none ;
            --tw-ring-color: transparent ;
        }

        @media print {

            html,
            body {
                background: #fff;
                padding: 0;
                margin: 0;
            }

            @page {
                size: A4 portrait;
                margin: 12mm 10mm;
            }

            .no-print {
                display: none;
            }

            * {
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }

            .bg-gray-100 {
                background: #fff;
            }

            .bg-white.rounded-lg.shadow {
                box-shadow: none;
                border-radius: 0;
                padding: 0;
            }

            .container {
                width: 100%;
                max-width: 100%;
                padding: 0;
                margin: 0;
            }

            .overflow-x-auto {
                overflow: visible;
            }

            table {
                width: 100%;
                table-layout: fixed;
                border-collapse: collapse;
                font-size: 11pt;
            }


            thead th:nth-child(1),
            tbody td:nth-child(1) {
                width: 20%;
                white-space: nowrap;
            }

            thead th:nth-child(2),
            tbody td:nth-child(2) {
                width: 23%;
            }

            thead th:nth-child(3),
            tbody td:nth-child(3) {
                width: 15%;
                white-space: nowrap;
            }

            thead th:nth-child(4),
            tbody td:nth-child(4) {
                width: 22%;
            }

            thead th:nth-child(5),
            tbody td:nth-child(5) {
                width: 20%;
            }

            th,
            td {
                border: 1px solid #555;
                padding: 6px 8px;
                vertical-align: top;
            }

            thead,
            thead tr,
            thead th {
                background: #ffffff ;
                color: #000000 ;
            }

            input[type="date"],
            input[type="time"],
            input[type="text"],
            textarea {
                border: none ;
                background: transparent ;
                padding: 0;
                margin: 0;
                width: 100%;
                font-size: 10.5pt;
                font-family: inherit;
                color: #000;
                appearance: none;
                box-shadow: none ;
                outline: none ;
            }

            input[type="time"] {
                white-space: nowrap;
            }

            input:focus,
            input[readonly],
            textarea[readonly],
            textarea:focus {
                background: transparent ;
                outline: none ;
                box-shadow: none ;
                border: none ;
            }

            textarea {
                height: auto;
                overflow: visible;
                white-space: pre-wrap;
                word-break: break-word;
            }

            .flex.flex-col.gap-2 {
                display: block;
            }

            .flex.flex-col.gap-2 input {
                display: block;
                margin-bottom: 6px;
                line-height: 1.5;
            }

            .flex.justify-between.items-start {
                display: flex;
                align-items: flex-start;
                justify-content: space-between;
                margin-bottom: 12px;
            }

            img {
                display: block;
            }

            #mois-debut-input,
            #mois-fin-input {
                display: none;
            }

            #mois-debut-texte,
            #mois-fin-texte {
                display: inline;
            }

            tr {
                page-break-inside: avoid;
            }
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

    <div class="container mx-auto px-4 py-8">

        <div class="bg-white rounded-lg shadow p-6">

        
            @if (session('success'))
                <div class="mb-4 p-4 rounded-lg bg-green-100 border border-green-400 text-green-700 no-print">
                    {{ session('success') }}
                </div>
            @endif

        
            @if ($errors->any())
                <div class="mb-4 p-4 rounded-lg bg-red-100 border border-red-400 text-red-700 no-print">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->unique() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            
            <div class="flex justify-between items-start mb-6">

                <img src="{{ asset('images/logo.png') }}"
                    class="object-contain flex-shrink-0"
                    style="width: 80px; height: 80px;">

                <div class="flex-1 text-center px-4">

                    <p class="text-sm font-bold text-gray-900">
                        REPUBLIQUE DU CONGO
                    </p>

                    <p class="text-sm font-bold text-gray-900">
                        MINISTÈRE DES FINANCES, DU BUDGET ET DU PORTEFEUILLE PUBLIC
                    </p>

                    <p class="text-sm font-bold text-gray-900">
                        AGENCE CONGOLAISE DES SYSTÈMES D'INFORMATION
                    </p>

                    <br>

                    <p class="text-sm font-bold text-gray-900">
                        DIRECTION DEPARTEMENTALE
                    </p>

                    <p class="text-sm font-bold text-gray-900">
                        Service Études Système Réseaux et Maintenance
                    </p>

                    <p class="text-sm font-bold text-gray-900">
                        Section Système Réseaux et Maintenance
                    </p>

                    <div class="mt-4">

                        <hr class="border-black my-2">

                        <p class="text-base font-bold text-gray-900 uppercase">
                            Planning de Travail
                        </p>

                        <div class="flex items-center justify-center gap-2 mt-2 text-sm font-bold text-gray-900">

                            <span>DU MOIS DE</span>

                            @if ($planning)

                                <span id="mois-debut-texte"
                                    class="underline">
                                    {{ $planning->first()->mois_debut }}
                                </span>

                                <input type="text"
                                    name="mois_debut"
                                    form="form-planning"
                                    id="mois-debut-input"
                                    value="{{ old('mois_debut', $planning->first()->mois_debut) }}"
                                    class="border border-gray-300 rounded px-2 py-1 text-sm w-28 hidden {{ $errors->has('mois_debut') ? 'champ-erreur' : '' }}">

                            @else

                                <input type="text"
                                    name="mois_debut"
                                    form="form-planning"
                                    value="{{ old('mois_debut') }}"
                                    class="border border-gray-300 rounded px-2 py-1 text-sm w-28 {{ $errors->has('mois_debut') ? 'champ-erreur' : '' }}">

                            @endif

                            <span>AU MOIS DE</span>

                            @if ($planning)

                                <span id="mois-fin-texte"
                                    class="underline">
                                    {{ $planning->first()->mois_fin }}
                                </span>

                                <input type="text"
                                    name="mois_fin"
                                    form="form-planning"
                                    id="mois-fin-input"
                                    value="{{ old('mois_fin', $planning->first()->mois_fin) }}"
                                    class="border border-gray-300 rounded px-2 py-1 text-sm w-28 hidden {{ $errors->has('mois_fin') ? 'champ-erreur' : '' }}">

                            @else

                                <input type="text"
                                    name="mois_fin"
                                    form="form-planning"
                                    value="{{ old('mois_fin') }}"
                                    class="border border-gray-300 rounded px-2 py-1 text-sm w-28 {{ $errors->has('mois_fin') ? 'champ-erreur' : '' }}">

                            @endif

                        </div>

                        <div class="flex items-center justify-center gap-2 mt-2">
                            <p>Client :</p>

                            <p class="text-sm font-bold text-gray-900">
                                {{ $client->client }}
                            </p>
                        </div>

                    </div>
                </div>

                <img src="{{ asset('images/logo_mf.png') }}"
                    class="object-contain flex-shrink-0"
                    style="width: 80px; height: 80px;">

            </div>

           
            <form id="form-planning"
                method="POST"
                action="{{ $planning
                    ? route('technicien.planning_intervention.update', $client->id)
                    : route('technicien.planning_intervention.store', $client->id) }}">

                @csrf

                <div class="overflow-x-auto mt-6">

                    <table class="w-full border border-gray-300 text-sm">

                        <thead style="background-color: #f3f4f6;">

                            <tr>

                                <th class="border border-gray-300 px-4 py-3 text-left font-medium text-gray-700">
                                    Date
                                </th>

                                <th class="border border-gray-300 px-4 py-3 text-left font-medium text-gray-700">
                                    Activité
                                </th>

                                <th class="border border-gray-300 px-4 py-3 text-left font-medium text-gray-700">
                                    Heures
                                </th>

                                <th class="border border-gray-300 px-4 py-3 text-left font-medium text-gray-700">
                                    Équipe
                                </th>

                                <th class="border border-gray-300 px-4 py-3 text-left font-medium text-gray-700">
                                    Observation
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr class="align-top">

                               
                                <td class="border border-gray-300 px-4 py-3">

                                    <div class="flex flex-col gap-2">

                                        @foreach (range(0, 5) as $i)

                                            <input type="date"
                                                name="dates[{{ $i }}]"
                                                data-champ
                                                value="{{ old('dates.' . $i, $planning ? optional($planning->get($i))->date : '') }}"
                                                {{ $planning && !$errors->any() ? 'readonly' : '' }}
                                                class="border border-gray-300 rounded px-2 py-1 text-sm w-full
                                                {{ $planning && !$errors->any() ? 'bg-gray-100 cursor-not-allowed' : '' }}
                                                {{ $errors->has('dates.' . $i) ? 'champ-erreur' : '' }}">

                                        @endforeach

                                    </div>

                                </td>

                                
                                <td class="border border-gray-300 px-4 py-3">

                                    <textarea name="activite"
                                        rows="14"
                                        placeholder="Décrire l'activité"
                                        data-champ
                                        {{ $planning && !$errors->any() ? 'readonly' : '' }}
                                        class="w-full border border-gray-300 rounded px-2 py-1 text-sm
                                        {{ $planning && !$errors->any() ? 'bg-gray-100 cursor-not-allowed' : '' }}
                                        {{ $errors->has('activite') ? 'champ-erreur' : '' }}">{{ old('activite', $planning ? $planning->first()->activite : '') }}</textarea>

                                </td>

                                
                                <td class="border border-gray-300 px-4 py-3">

                                    <div class="flex flex-col gap-2">

                                        @foreach (range(0, 5) as $i)

                                            <input type="time"
                                                name="heures[{{ $i }}]"
                                                data-champ
                                                value="{{ old(
                                                    'heures.' . $i,
                                                    $planning && optional($planning->get($i))->heure
                                                        ? \Carbon\Carbon::parse(optional($planning->get($i))->heure)->format('H:i')
                                                        : '',
                                                ) }}"
                                                {{ $planning && !$errors->any() ? 'readonly' : '' }}
                                                class="border border-gray-300 rounded px-2 py-1 text-sm w-full
                                                {{ $planning && !$errors->any() ? 'bg-gray-100 cursor-not-allowed' : '' }}
                                                {{ $errors->has('heures.' . $i) ? 'champ-erreur' : '' }}">

                                        @endforeach

                                    </div>

                                </td>

                               
                                <td class="border border-gray-300 px-4 py-3">

                                    <div class="flex flex-col gap-2">

                                        @foreach (range(0, 5) as $i)

                                            <input type="text"
                                                name="equipes[{{ $i }}]"
                                                data-champ
                                                placeholder="Équipe {{ $i + 1 }}"
                                                value="{{ old('equipes.' . $i, $planning ? optional($planning->get($i))->equipe : '') }}"
                                                {{ $planning && !$errors->any() ? 'readonly' : '' }}
                                                class="border border-gray-300 rounded px-2 py-1 text-sm w-full
                                                {{ $planning && !$errors->any() ? 'bg-gray-100 cursor-not-allowed' : '' }}
                                                {{ $errors->has('equipes.' . $i) ? 'champ-erreur' : '' }}">

                                        @endforeach

                                    </div>

                                </td>

                               
                                <td class="border border-gray-300 px-4 py-3">

                                    <textarea name="observation"
                                        rows="14"
                                        data-champ
                                        {{ $planning && !$errors->any() ? 'readonly' : '' }}
                                        class="w-full border border-gray-300 rounded px-2 py-1 text-sm
                                        {{ $planning && !$errors->any() ? 'bg-gray-100 cursor-not-allowed' : '' }}
                                        {{ $errors->has('observation') ? 'champ-erreur' : '' }}">{{ old('observation', $planning ? $planning->first()->observation : '') }}</textarea>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

                
                <div class="flex justify-end gap-3 mt-6 no-print">

                    @if (!$planning)

                        <button type="submit"
                            class="px-5 py-2 text-white rounded-lg text-sm font-medium transition hover:opacity-90 active:scale-95"
                            style="background-color: #006937;">

                            Enregistrer

                        </button>

                    @else

                        <button type="button"
                            id="btn-modifier"
                            onclick="activerEdition()"
                            class="px-5 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 text-sm font-medium transition active:scale-95
                            {{ $errors->any() ? 'hidden' : '' }}">

                            Modifier

                        </button>

                        <button type="submit"
                            id="btn-enregistrer"
                            class="px-5 py-2 text-white rounded-lg text-sm font-medium transition hover:opacity-90 active:scale-95
                            {{ $errors->any() ? '' : 'hidden' }}"
                            style="background-color: #006937;">

                            Enregistrer les modifications

                        </button>

                        <button type="button"
                            id="btn-telecharger"
                            onclick="imprimerProprement()"
                            class="px-5 py-2 text-white rounded-lg text-sm font-medium transition hover:opacity-90 active:scale-95
                            {{ $errors->any() ? 'hidden' : '' }}"
                            style="background-color: #006937;">

                            Télécharger

                        </button>

                    @endif

                </div>

            </form>

        </div>

    </div>

    <script>
        function activerEdition() {

            document.querySelectorAll('[data-champ]').forEach(function(champ) {

                champ.removeAttribute('readonly');

                champ.classList.remove('bg-gray-100', 'cursor-not-allowed');

            });

            const moisDebutTexte = document.getElementById('mois-debut-texte');
            const moisDebutInput = document.getElementById('mois-debut-input');

            const moisFinTexte = document.getElementById('mois-fin-texte');
            const moisFinInput = document.getElementById('mois-fin-input');

            if (moisDebutTexte) moisDebutTexte.classList.add('hidden');
            if (moisDebutInput) moisDebutInput.classList.remove('hidden');

            if (moisFinTexte) moisFinTexte.classList.add('hidden');
            if (moisFinInput) moisFinInput.classList.remove('hidden');

            document.getElementById('btn-modifier').classList.add('hidden');

            document.getElementById('btn-enregistrer').classList.remove('hidden');

            document.getElementById('btn-telecharger').classList.add('hidden');
        }

        function imprimerProprement() {

            document.querySelectorAll('input, textarea').forEach(function(el) {

                el.style.backgroundColor = 'transparent';
                el.style.border = 'none';
                el.style.outline = 'none';
                el.style.boxShadow = 'none';

            });

            window.print();

            document.querySelectorAll('input[readonly], textarea[readonly]').forEach(function(el) {

                el.style.backgroundColor = '';
                el.style.border = '';
                el.style.outline = '';
                el.style.boxShadow = '';

            });
        }
    </script>

</body>

</html>
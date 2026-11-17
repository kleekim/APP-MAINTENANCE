<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"></h2>
    </x-slot>

    <style>
        .si-page {
            background: #f8fafc;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        .kpi-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 24px;
            width: 100%;
        }

        .kpi-card {
            background: #fff;
            border-radius: 14px;
            border: 1px solid #e8ecf0;
            padding: 22px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .kpi-card .klabel {
            font-size: 11px;
            font-weight: 600;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: .7px;
            margin-bottom: 8px;
        }

        .kpi-card .kval {
            font-size: 34px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 6px;
            line-height: 1;
        }

        .kpi-card .ksub {
            font-size: 12px;
            color: #6b7280;
        }

        @media(max-width: 768px) {
            .kpi-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ===== Tableau : tout est centré ===== */
        .table-interventions {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
            min-width: 900px;
        }

        .table-interventions th,
        .table-interventions td {
            text-align: center;
            vertical-align: middle;
            padding: 14px 10px;
            font-size: 14px;
            word-wrap: break-word;
        }

        .table-interventions thead th {
            color: #fff;
            font-weight: 600;
            background-color: #006937;
        }

        .select-interventions {
            background-color: #fff;
            color: #006937;
            font-size: 13px;
            font-weight: 600;
            padding: 6px 10px;
            border-radius: 8px;
            border: 2px solid #006937;
            cursor: pointer;
            width: 100%;
            max-width: 170px;
            text-align: center;
            text-align-last: center;
            outline: none;
        }

        .select-interventions:focus {
            outline: none;
            border-color: #006937;
            box-shadow: 0 0 0 2px rgba(0, 105, 55, 0.25);
        }

        /* ===== Modals ===== */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-box {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 10px 50px rgba(0, 0, 0, 0.3);
            max-height: 92vh;
            overflow-y: auto;
            width: 100%;
            max-width: 860px;
            position: relative;
        }

        .modal-topbar {
            position: sticky;
            top: 0;
            z-index: 10;
            background: #fff;
            display: flex;
            justify-content: flex-end;
            padding: 8px 14px;
            gap: 8px;
        }

        .modal-topbar button {
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 5px 14px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-fermer {
            background: #ef4444;
        }

        .btn-telecharger {
            background: #006937;
        }

        .fiche-intervention-wrap {
            font-family: Arial, sans-serif;
            padding: 20px 40px;
            color: #000;
        }

        .fiche-intervention-wrap .fiche-logos {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .fiche-intervention-wrap .logo-left,
        .fiche-intervention-wrap .logo-right {
            width: 100px;
            height: auto;
            margin-bottom: 20px;
        }

        .fiche-intervention-wrap .header-center {
            flex: 1;
            text-align: center;
        }

        .fiche-intervention-wrap .header-center h4 {
            margin: 3px 0;
            font-size: 14px;
            font-weight: bold;
        }

        .fiche-intervention-wrap input[type="text"],
        .fiche-intervention-wrap input[type="date"] {
            width: 100%;
            padding: 6px 10px;
            margin-top: 4px;
            border: 1px solid #000;
            background: #ffffff;
            border-radius: 6px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .fiche-intervention-wrap textarea {
            width: 100%;
            resize: none;
            height: 100px;
            border: none;
            background: transparent;
            font-size: 14px;
            box-sizing: border-box;
        }

        .fiche-intervention-wrap .intervention-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 15px;
        }

        .fiche-intervention-wrap .intervention-table th,
        .fiche-intervention-wrap .intervention-table td {
            border: 1px solid #000;
            padding: 10px;
            vertical-align: top;
            text-align: left;
        }

        .modal-box input:focus,
        .modal-box textarea:focus,
        .modal-box select:focus {
            outline: none;
            box-shadow: none;
            --tw-ring-shadow: none;
            --tw-ring-color: transparent;
        }

        /* ===== Impression ===== */
        @media print {
            body * {
                visibility: hidden;
            }

            .fiche-a-imprimer,
            .fiche-a-imprimer * {
                visibility: visible;
            }

            .fiche-a-imprimer {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                margin: 0;
                padding: 15mm;
                box-sizing: border-box;
                background: #fff;
            }

            .fiche-a-imprimer .logo-left,
            .fiche-a-imprimer .logo-right {
                width: 70px;
            }

            .fiche-a-imprimer .header-center h4 {
                font-size: 11pt;
                margin: 1px 0;
            }

            .fiche-a-imprimer .intervention-table textarea {
                font-size: 11pt;
                color: #000;
            }

            @page {
                size: A4 portrait;
                margin: 0;
            }
        }
    </style>

    <div class="si-page">
        <div class="max-w-7xl mx-auto px-4 py-8">

            <div class="kpi-grid">

                <div class="kpi-card" style="border-top: 3px solid #006937;">
                    <div>
                        <div class="klabel">Total interventions</div>
                        <div class="kval">{{ $totalInterventions }}</div>
                        <div class="ksub">Demandes avec fiche intervention</div>
                    </div>
                </div>

                <div class="kpi-card" style="border-top: 3px solid #f7be00;">
                    <div>
                        <div class="klabel">Interventions en cours</div>
                        <div class="kval">{{ $enCours }}</div>
                        <div class="ksub">Actives</div>
                    </div>
                </div>

                <div class="kpi-card" style="border-top: 3px solid #ae1410;">
                    <div>
                        <div class="klabel">Interventions terminées</div>
                        <div class="kval">{{ $terminees }}</div>
                        <div class="ksub">Finalisées</div>
                    </div>
                </div>

            </div>

            <div class="bg-white rounded-lg shadow p-6">

                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-900">Liste des Interventions</h2>
                </div>

                <div class="mb-4 flex items-center gap-3">

                    <input type="text" id="userSearch" placeholder="Rechercher une intervention..."
                        onkeyup="filterTable(this.value)"
                        class="w-full sm:w-80 border border-gray-300 rounded-md px-4 py-2 text-sm"
                        onfocus="this.style.outline='none'; this.style.boxShadow='0 0 0 2px #006937'; this.style.borderColor='#006937';"
                        onblur="this.style.boxShadow=''; this.style.borderColor='#d1d5db';">

                    <button type="button" id="searchButton"
                        class="bg-green-700 hover:bg-green-800 text-black px-4 py-2 rounded-md text-sm font-medium">
                        Rechercher
                    </button>

                </div>

                <div class="rounded-lg border border-gray-200" style="max-height: 65vh; overflow: auto;">
                    <table class="table-interventions">
                        <colgroup>
                            <col style="width: 7%;">
                            <col style="width: 19%;">
                            <col style="width: 16%;">
                            <col style="width: 16%;">
                            <col style="width: 11%;">
                            <col style="width: 16%;">
                            <col style="width: 15%;">
                        </colgroup>
                        <thead style="position: sticky; top: 0; z-index: 10;">
                            <tr style="background-color: #006937;">
                                <th>N⁰</th>
                                <th>Client</th>
                                <th>Equipement</th>
                                <th>Technicien</th>
                                <th>Nombres d'interventions</th>
                                <th>Interventions</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody id="interventionsTableBody">
                            @php
                                $fichesParTech = collect($interventions)
                                    ->filter(fn($f) => trim($f->Technicien_Nom ?? '') !== '')
                                    ->groupBy(fn($f) => mb_strtolower(trim($f->Technicien_Nom)));

                                $compteurs = $fichesParTech->map->count();
                            @endphp

                            @forelse($interventions as $index => $fiche)
                                @php
                                    $cle = mb_strtolower(trim($fiche->Technicien_Nom ?? ''));
                                    $liste = $cle !== '' ? $fichesParTech[$cle] ?? collect() : collect();
                                @endphp

                                <tr class="border-b hover:bg-green-50 transition-colors intervention-row">
                                    <td class="text-gray-900">{{ $index + 1 }}</td>

                                    <td class="text-gray-900">
                                        {{ $fiche->demande->nom_complet ?? '-' }}
                                    </td>

                                    <td class="text-gray-900">
                                        {{ $fiche->demande->ficheaccueil->type_machine ?? '-' }}
                                    </td>

                                    <td class="text-gray-900">
                                        {{ $fiche->demande->ficheIntervention->Technicien_Nom ?? '-' }}
                                    </td>

                                    <td class="text-gray-900">
                                        {{ $cle !== '' ? $compteurs[$cle] ?? 0 : '-' }}
                                    </td>

                                    <td>
                                        @if ($liste->count())
                                            <select class="select-interventions" onchange="ouvrirFiche(this)">
                                                <option value="" style="color:#000;">Voir ({{ $liste->count() }})
                                                </option>
                                                @foreach ($liste as $f)
                                                    <option value="modal-fiche-{{ $f->id }}" style="color:#000;">
                                                        {{ $f->demande->nom_complet ?? 'Client' }} -
                                                        {{ $f->date_arrivee ? \Carbon\Carbon::parse($f->date_arrivee)->format('d/m/Y') : 'sans date' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        <span
                                            style="{{ $fiche->demande->statut_couleur }} display:inline-block; padding:3px 12px; border-radius:9999px; font-size:12px; font-weight:600;">
                                            {{ $fiche->demande->statut_label }}
                                        </span>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-6 text-center text-sm text-gray-400">
                                        Aucune intervention enregistrée.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

    {{-- ===== Modals des fiches d'intervention ===== --}}
    @foreach ($interventions as $f)
        <div id="modal-fiche-{{ $f->id }}" class="modal-overlay"
            onclick="if(event.target===this) fermerModal('modal-fiche-{{ $f->id }}')">
            <div class="modal-box">
                <div class="modal-topbar">
                    <button class="btn-fermer" onclick="fermerModal('modal-fiche-{{ $f->id }}')">✕
                        Fermer</button>
                    <button class="btn-telecharger" onclick="telecharger(this)">Télécharger</button>
                </div>

                <div class="fiche-intervention-wrap">
                    <div class="fiche-logos">
                        <img src="{{ asset('images/logo.png') }}" class="logo-left">
                        <div class="header-center">
                            <h4>REPUBLIQUE DU CONGO</h4>
                            <h4>MINISTÈRE DES FINANCES, DU BUDGET</h4>
                            <h4>ET DU PORTEFEUILLE PUBLIC</h4>
                            <h4>AGENCE CONGOLAISE DES SYSTÈMES D'INFORMATION</h4>
                            <h4>DIRECTION DEPARTEMENTALE</h4>
                            <hr style="border:none;height:1px;background-color:#000;margin:4px 0;">
                            <h4>FICHE D'INTERVENTION TRAVAUX DE MAINTENANCE</h4>
                            <h4>CLIENT PARTICULIER</h4>
                        </div>
                        <img src="{{ asset('images/logo_mf.png') }}" class="logo-right">
                    </div>

                    <p style="font-size:14px;"><strong>CLIENT :</strong>
                        <input type="text" value="{{ $f->demande->nom_complet ?? '' }}" readonly>
                    </p>
                    <p style="font-size:14px;"><strong>DATE D'ARRIVEE :</strong>
                        <input type="date" value="{{ $f->date_arrivee ?? '' }}" readonly style="width:30%;">
                    </p>
                    <p style="font-size:14px;"><strong>DATE DE SORTIE :</strong>
                        <input type="date" value="{{ $f->date_sortie ?? '' }}" readonly style="width:30%;">
                    </p>

                    <div class="intervention-table-wrap">
                        <table class="intervention-table">
                            <tr>
                                <th width="50%">MOTIF DE L'INTERVENTION</th>
                                <th width="50%">TECHNICIEN(S)</th>
                            </tr>
                            <tr>
                                <td><textarea readonly>{{ $f->motif_intervention ?? '' }}</textarea></td>
                                <td>
                                    <strong>Nom(s) :</strong><br><br>
                                    <textarea readonly>{{ $f->Technicien_Nom ?? '' }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2" style="text-align:center;">Compte rendu de l'intervention</th>
                            </tr>
                            <tr>
                                <td colspan="2"><textarea readonly>{{ $f->Compte_rendues_Intervention ?? '' }}</textarea></td>
                            </tr>
                            <tr>
                                <th colspan="2" style="text-align:left;">Proposition du montant à payer :</th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="text" value="{{ $f->Proposition_Montant ?? '' }}" readonly
                                        style="border:none;background:transparent;width:100%;font-size:15px;">
                                </td>
                            </tr>
                            <tr>
                                <th>Nom et signature du commercial</th>
                                <th>Nom et signature du technicien</th>
                            </tr>
                            <tr>
                                <td style="height:80px;"></td>
                                <td style="height:80px;"></td>
                            </tr>
                        </table>
                    </div>

                    <div class="fiche-footer" style="font-size:13px;color:#333;margin-top:10px;">
                        Brazzaville : 04 444 87 31 - STD<br>
                        Pointe-Noire : 04 444 07 25 STD<br>
                        06 611 48 51 - SFBMC
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        function filterTable(query) {
            const rows = document.querySelectorAll('#interventionsTableBody .intervention-row');
            const q = query.toLowerCase().trim();

            rows.forEach(row => {
                row.style.display =
                    (!q || row.innerText.toLowerCase().includes(q)) ?
                    '' :
                    'none';
            });
        }

        document.getElementById('searchButton').addEventListener('click', function() {
            const value = document.getElementById('userSearch').value;
            filterTable(value);
        });

        function ouvrirModal(id) {
            document.getElementById(id).classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function fermerModal(id) {
            document.getElementById(id).classList.remove('active');
            document.body.style.overflow = '';
        }

        function ouvrirFiche(select) {
            if (!select.value) return;
            ouvrirModal(select.value);
            select.value = ''; // remet le menu sur "Voir (n)"
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal-overlay.active').forEach(m => m.classList.remove('active'));
                document.body.style.overflow = '';
            }
        });

        function telecharger(btn) {
            document.querySelectorAll('.fiche-a-imprimer').forEach(el => el.classList.remove('fiche-a-imprimer'));
            var fiche = btn.closest('.modal-box').querySelector('.fiche-intervention-wrap');
            fiche.classList.add('fiche-a-imprimer');
            window.print();
            setTimeout(() => fiche.classList.remove('fiche-a-imprimer'), 1000);
        }
    </script>

</x-app-layout>
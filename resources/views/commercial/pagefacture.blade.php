<x-app-layout>
    <x-slot name="header"></x-slot>

    <style>
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

        .fiche-accueil-wrap input[readonly],
        .fiche-accueil-wrap textarea[readonly] {
            background: #e9ecef;
            color: #6c757d;
            cursor: not-allowed;
            border-color: #ced4da;
        }

        .fiche-accueil-wrap {
            font-family: Arial, sans-serif;
            padding: 40px;
        }

        .fiche-accueil-wrap .fiche-logos {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .fiche-accueil-wrap .logo-left,
        .fiche-accueil-wrap .logo-right {
            width: 100px;
            margin-bottom: 30px;
        }

        .fiche-accueil-wrap .header-center {
            flex: 1;
            text-align: center;
        }

        .fiche-accueil-wrap .header-center h4,
        .fiche-accueil-wrap .header-center h5 {
            margin: 3px 0;
            font-size: 14px;
            font-weight: bold;
        }

        .fiche-accueil-wrap .form-group {
            margin-bottom: 15px;
        }

        .fiche-accueil-wrap .form-row {
            display: flex;
            gap: 15px;
        }

        .fiche-accueil-wrap .form-row .form-group {
            flex: 1;
        }

        .fiche-accueil-wrap label {
            font-weight: bold;
        }

        .fiche-accueil-wrap input,
        .fiche-accueil-wrap textarea {
            width: 100%;
            padding: 8px 10px;
            margin-top: 5px;
            border: 1px solid #000;
            background: #f2f5fc;
            border-radius: 6px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .fiche-accueil-wrap textarea {
            height: 120px;
            resize: none;
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
            height: 120px;
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
        }

        .modal-box input:focus,
        .modal-box textarea:focus,
        .modal-box select:focus {
            outline: none;
            border: 2px solid #000;
            box-shadow: none;
            --tw-ring-shadow: none;
            --tw-ring-color: transparent;
        }
    </style>


    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Facturation Client</h2>
            </div>


            <div class="mb-4 flex items-center gap-3">

                <input type="text" id="userSearch" placeholder="Rechercher une facture..."
                    onkeyup="filterTable(this.value)"
                    class="w-full sm:w-80 border border-gray-300 rounded-md px-4 py-2 text-sm"
                    onfocus="this.style.outline='none'; this.style.boxShadow='0 0 0 2px #006937'; this.style.borderColor='#006937';"
                    onblur="this.style.boxShadow=''; this.style.borderColor='#d1d5db';">

                <button onclick="filterTable(document.getElementById('userSearch').value)"
                    class="bg-green-700 hover:bg-green-800 text-black px-4 py-2 rounded-md text-sm font-medium">
                    Rechercher
                </button>

            </div>

            <div class="rounded-lg border border-gray-200" style="max-height: 65vh; overflow-y: auto;">
                <table class="w-full">
                    <thead>
                        <tr style="background-color: #006937;">
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Nom Client</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Objet</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Panne</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Date</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Statut facture</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="facturationTableBody">
                        @forelse($demandes as $index => $demande)
                            <tr class="border-t border-gray-200 hover:bg-green-50 transition-colors facturation-row">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $demande->nom_complet }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $demande->objet }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $demande->panne }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                    {{ $demande->created_at->format('d/m/Y') }}</td>


                                <td class="px-6 py-4 text-sm whitespace-nowrap">
                                    @if ($demande->facture && $demande->facture->statut === 'facturée')
                                        <span
                                            class="inline-block px-3 py-1 text-xs font-semibold rounded-full whitespace-nowrap bg-green-100 text-green-800">
                                            Facturée
                                        </span>
                                    @else
                                        <span
                                            class="inline-block px-3 py-1 text-xs font-semibold rounded-full whitespace-nowrap bg-yellow-100 text-yellow-800">
                                            Non facturée
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-sm whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <button onclick="ouvrirModal('modal-accueil-{{ $demande->id }}')"
                                            style="background-color:#006937; display:inline-flex; align-items:center; padding:6px 12px; color:#ffffff; font-size:14px; font-weight:600; border-radius:8px; text-decoration:none;"
                                            onmouseover="this.style.backgroundColor='#005a2e'"
                                            onmouseout="this.style.backgroundColor='#006937'">
                                            Fiche accueil
                                        </button>
                                        <button onclick="ouvrirModal('modal-intervention-{{ $demande->id }}')"
                                            style="background-color:#006937; display:inline-flex; align-items:center; padding:6px 12px; color:#ffffff; font-size:14px; font-weight:600; border-radius:8px; text-decoration:none;"
                                            onmouseover="this.style.backgroundColor='#005a2e'"
                                            onmouseout="this.style.backgroundColor='#006937'">
                                            Fiche intervention
                                        </button>
                                        <a href="{{ route('commercial.facturation', $demande->id) }}"
                                            style="background-color:#006937; display:inline-flex; align-items:center; padding:6px 12px; color:#ffffff; font-size:14px; font-weight:600; border-radius:8px; text-decoration:none;"
                                            onmouseover="this.style.backgroundColor='#005a2e'"
                                            onmouseout="this.style.backgroundColor='#006937'">
                                            {{ $demande->facture ? 'facture' : 'Établir la facture' }}
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-8 text-gray-400 text-sm">Aucune demande trouvée
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach ($demandes as $demande)
        @php
            $ficheA = $demande->ficheAccueil;
            $ficheI = $demande->ficheIntervention;
        @endphp


        <div id="modal-accueil-{{ $demande->id }}" class="modal-overlay"
            onclick="if(event.target===this) fermerModal('modal-accueil-{{ $demande->id }}')">
            <div class="modal-box">
                <div class="modal-topbar">
                    <button class="btn-fermer" onclick="fermerModal('modal-accueil-{{ $demande->id }}')">✕
                        Fermer</button>
                </div>
                <div class="fiche-accueil-wrap">
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
                    <div class="form-row">
                        <div class="form-group">
                            <label>N°</label>
                            <input type="number" value="{{ $demande->id }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" value="{{ $demande->created_at->format('Y-m-d') }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Heure</label>
                        <input type="time" value="{{ $demande->created_at->format('H:i') }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nom du client</label>
                        <input type="text" value="{{ $demande->nom_complet }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Téléphone</label>
                        <input type="text" value="{{ $demande->telephone }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Type de machines</label>
                        <input type="text" value="{{ $ficheA->type_machine ?? '' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Accessoires</label>
                        <input type="text" value="{{ $ficheA->accessoires ?? '' }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Informations commercial</label>
                        <textarea readonly>{{ $ficheA->informations_commerciale ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Informations technicien</label>
                        <textarea readonly>{{ $ficheA->informations_technicien ?? '' }}</textarea>
                    </div>
                    <div
                        style="display:flex;justify-content:space-between;margin-top:15px;margin-bottom:20px;text-align:center;">
                        <div style="width:32%;padding-top:40px;"><strong>Agent commercial</strong><br><span
                                style="font-size:12px;color:#555;">Nom &amp; Signature</span></div>
                        <div style="width:32%;padding-top:40px;"><strong>Client</strong><br><span
                                style="font-size:12px;color:#555;">Signature</span></div>
                        <div style="width:32%;padding-top:40px;"><strong>Technicien</strong><br><span
                                style="font-size:12px;color:#555;">Nom &amp; Signature</span></div>
                    </div>
                </div>
            </div>
        </div>


        <div id="modal-intervention-{{ $demande->id }}" class="modal-overlay"
            onclick="if(event.target===this) fermerModal('modal-intervention-{{ $demande->id }}')">
            <div class="modal-box">
                <div class="modal-topbar">
                    <button class="btn-fermer" onclick="fermerModal('modal-intervention-{{ $demande->id }}')">✕
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

                    <p style="font-size:14px;">
                        <strong>CLIENT :</strong>
                        <input type="text" value="{{ $demande->nom_complet }}" readonly>
                    </p>
                    <p style="font-size:14px;">
                        <strong>DATE D'ARRIVEE :</strong>
                        <input type="date" value="{{ $ficheI?->date_arrivee ?? '' }}" readonly
                            style="width:30%;">
                    </p>
                    <p style="font-size:14px;">
                        <strong>DATE DE SORTIE :</strong>
                        <input type="date" value="{{ $ficheI?->date_sortie ?? '' }}" readonly style="width:30%;">
                    </p>

                    <div class="intervention-table-wrap">
                        <table class="intervention-table">
                            <tr>
                                <th width="50%">MOTIF DE L'INTERVENTION</th>
                                <th width="50%">TECHNICIEN(S)</th>
                            </tr>
                            <tr>
                                <td>
                                    <textarea readonly style="resize:none;height:100px;">{{ $ficheI?->motif_intervention ?? '' }}</textarea>
                                </td>
                                <td>
                                    <strong>Nom(s) :</strong><br><br>
                                    <textarea readonly style="resize:none;height:100px;">{{ $ficheI?->Technicien_Nom ?? '' }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2" style="text-align:center;">Compte rendu de l'intervention</th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <textarea readonly style="height:100px;resize:none;">{{ $ficheI?->Compte_rendues_Intervention ?? '' }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2" style="text-align:left;">Proposition du montant à payer :</th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="text" value="{{ $ficheI?->Proposition_Montant ?? '' }}" readonly
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

                    <div class="fiche-footer" style="font-size:13px;color:#333;">
                        Brazzaville : 04 444 87 31 - STD<br>
                        Pointe-Noire : 04 444 07 25 STD<br>
                        06 611 48 51 - SFBMC
                    </div>
                </div>

            </div>
        </div>
    @endforeach

    <style>
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
                height: 100%;
                margin: 0;
                padding: 15mm 15mm 10mm 15mm;
                box-sizing: border-box;
                font-family: Arial, sans-serif;
                color: #000;
                background: #fff;
                display: flex;
                flex-direction: column;
            }


            .fiche-a-imprimer .fiche-logos {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 5px;
            }

            .fiche-a-imprimer .logo-left,
            .fiche-a-imprimer .logo-right {
                width: 70px;
                height: auto;
            }

            .fiche-a-imprimer .header-center {
                flex: 1;
                text-align: center;
            }

            .fiche-a-imprimer .header-center h4 {
                margin: 1px 0;
                font-size: 11pt;
                font-weight: bold;
            }

            .fiche-a-imprimer .header-center hr {
                border: none;
                border-top: 1px solid #000;
                background-color: #000;
                height: 1px;
                margin: 3px 0;
                visibility: visible;
                display: block;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .fiche-a-imprimer p {
                margin: 4px 0;
                font-size: 11pt;
            }

            .fiche-a-imprimer input[type="text"],
            .fiche-a-imprimer input[type="date"] {
                border: 1px solid #000;
                background: #fff;
                padding: 4px 8px;
                font-size: 11pt;
                border-radius: 4px;
                -webkit-appearance: none;
                color: #000;
            }


            .fiche-a-imprimer .intervention-table-wrap {
                flex: 1;
                display: flex;
                flex-direction: column;
                margin-top: 6px;
            }

            .fiche-a-imprimer .intervention-table {
                width: 100%;
                height: 100%;
                border-collapse: collapse;
                font-size: 11pt;
                flex: 1;
            }

            .fiche-a-imprimer .intervention-table th,
            .fiche-a-imprimer .intervention-table td {
                border: 1px solid #000;
                padding: 6px 8px;
                vertical-align: top;
            }

            .fiche-a-imprimer .intervention-table textarea {
                width: 100%;
                height: 100%;
                min-height: 60px;
                border: none;
                background: transparent;
                font-size: 11pt;
                resize: none;
                color: #000;
                padding: 0;
            }

            .fiche-a-imprimer .intervention-table input[type="text"] {
                border: none;
                background: transparent;
                font-size: 11pt;
                padding: 0;
                color: #000;
            }


            .fiche-a-imprimer .fiche-footer {
                font-size: 9pt;
                color: #333;
                margin-top: 6px;
            }

            @page {
                size: A4 portrait;
                margin: 0;
            }
        }
    </style>


    <script>
        function ouvrirModal(id) {
            document.getElementById(id).classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function fermerModal(id) {
            document.getElementById(id).classList.remove('active');
            document.body.style.overflow = '';
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal-overlay.active').forEach(function(m) {
                    m.classList.remove('active');
                });
                document.body.style.overflow = '';
            }
        });

        function telecharger(btn) {

            document.querySelectorAll('.fiche-a-imprimer').forEach(function(el) {
                el.classList.remove('fiche-a-imprimer');
            });


            var fiche = btn.closest('.modal-box').querySelector('.fiche-intervention-wrap');
            fiche.classList.add('fiche-a-imprimer');

            window.print();

            setTimeout(function() {
                fiche.classList.remove('fiche-a-imprimer');
            }, 1000);
        }

        function filterTable(query) {
            const rows = document.querySelectorAll('#facturationTableBody .facturation-row');
            const q = query.toLowerCase().trim();
            rows.forEach(row => {
                row.style.display = (!q || row.innerText.toLowerCase().includes(q)) ? '' : 'none';
            });
        }
    </script>

</x-app-layout>

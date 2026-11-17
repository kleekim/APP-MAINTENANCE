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

        .fiche-facture-wrap {
            font-family: Arial, sans-serif;
            padding: 40px;
            color: #000;
        }

        .fiche-facture-wrap .fiche-logos {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .fiche-facture-wrap .logo-left,
        .fiche-facture-wrap .logo-right {
            width: 100px;
            height: auto;
            margin-bottom: 50px;
        }

        .fiche-facture-wrap .header-center {
            flex: 1;
            text-align: center;
        }

        .fiche-facture-wrap .header-center h4 {
            margin: 3px 0;
            font-size: 14px;
            font-weight: bold;
            color: #000;
        }

        .fiche-facture-wrap input[type="text"],
        .fiche-facture-wrap input[type="number"],
        .fiche-facture-wrap input[type="date"],
        .fiche-facture-wrap textarea {
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

        .fiche-facture-wrap .demande-table textarea,
        .fiche-facture-wrap .demande-table input {
            border: none ;
            background: transparent ;
            padding: 0 ;
            margin: 0 ;
            box-shadow: none ;
        }

        .fiche-facture-wrap input[readonly] {
            background: #e9ecef;
            color: #6c757d;
            cursor: not-allowed;
        }

        .fiche-facture-wrap input:focus,
        .fiche-facture-wrap textarea:focus {
            outline: none;
            border: 2px solid #000 ;
            box-shadow: none;
        }

        .fiche-facture-wrap textarea {
            resize: none;
            height: 120px;
        }

        .fiche-facture-wrap .demande-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            font-size: 15px;
        }

        .fiche-facture-wrap .demande-table th,
        .fiche-facture-wrap .demande-table td {
            border: 1px solid #000;
            padding: 10px;
            vertical-align: top;
        }

        .fiche-facture-wrap .footer-grid {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 30px;
            align-items: flex-start;
            font-size: 14px;
            line-height: 1.5;
        }

        .fiche-facture-wrap .footer-left {
            flex: 1;
            text-align: left;
            margin-right: 10px;
        }

        .fiche-facture-wrap .footer-right {
            flex: 1;
            text-align: right;
            margin-left: 10px;
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

        .fiche-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 16px 20px;
            margin-bottom: 14px;
        }

        .fiche-card .panne-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .fiche-card .panne-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #e8f5ec;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .fiche-card .panne-label {
            font-weight: 700;
            color: #111827;
            font-size: 15px;
        }

        .fiche-card .panne-date {
            font-size: 12px;
            color: #6b7280;
            margin-top: 2px;
        }

        .fiche-card .panne-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .doc-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            white-space: nowrap;
        }

        .doc-btn.available {
            background: #006937;
            color: #fff;
        }

        .doc-btn.available:hover {
            background: #005a2e;
        }

        .doc-btn.unavailable {
            background: #f3f4f6;
            color: #9ca3af;
            cursor: not-allowed;
        }



    </style>

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Mes Factures</h2>
            </div>

            @forelse ($demandes as $demande)
                @php
                    $facture = $demande->facture;
                @endphp

                <div class="fiche-card">
                    <div class="panne-info">
                        <div class="panne-icon">
                            <svg width="20" height="20" fill="none" stroke="#006937" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <div class="panne-label">{{ $demande->panne ?? $demande->objet }}</div>
                            <div class="panne-date">{{ $demande->created_at->format('d/m/Y') }}</div>
                        </div>
                    </div>

                    <div class="panne-actions">
                        @if ($facture)
                            <button class="doc-btn available"
                                onclick="ouvrirModal('modal-facture-{{ $demande->id }}')">Facture</button>
                        @else
                            <button class="doc-btn unavailable" disabled>Facture — non émise</button>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-center py-8 text-gray-400 text-sm">Vous n'avez aucune fiche pour le moment.</p>
            @endforelse
        </div>
    </div>

    
    @foreach ($demandes as $demande)
        @php
            $facture = $demande->facture;
        @endphp

        
        @if ($facture)
            <div id="modal-facture-{{ $demande->id }}" class="modal-overlay"
                onclick="if(event.target===this) fermerModal('modal-facture-{{ $demande->id }}')">
                <div class="modal-box">

                    <div class="modal-topbar">
                        <button class="btn-fermer" onclick="fermerModal('modal-facture-{{ $demande->id }}')">✕
                            Fermer</button>
                        <button class="btn-telecharger"
                            onclick="telecharger(this, 'fiche-facture-wrap')">Télécharger</button>
                    </div>

                    <div class="fiche-facture-wrap">

                        <div class="fiche-logos">
                            <img src="{{ asset('images/logo.png') }}" class="logo-left">
                            <div class="header-center">
                                <h4>REPUBLIQUE DU CONGO</h4>
                                <h4>MINISTÈRE DES FINANCES, DU BUDGET</h4>
                                <h4>ET DU PORTEFEUILLE PUBLIC</h4>
                                <h4>AGENCE CONGOLAISE DES SYSTÈMES D'INFORMATION</h4>
                                <h4>DIRECTION DEPARTEMENTALE</h4>
                                <hr style="border:none;height:1px;background-color:#000;margin:4px 0;">
                            </div>
                            <img src="{{ asset('images/logo_mf.png') }}" class="logo-right">
                        </div>

                        <br><br><br>


                        <div style="display:flex; flex-direction:column; gap:12px; max-width:500px;">
                            <div>
                                <strong>FACTURE N°</strong>
                                <input type="number" value="{{ $facture->Numéro ?? $facture->id }}" readonly>
                            </div>
                            <div>
                                <strong>Date</strong>
                                <input type="date" value="{{ $facture->Date ?? '' }}" readonly>
                            </div>
                            <div>
                                <strong>DOIT</strong>
                                <input type="text" value="{{ $facture->Doit ?? $demande->nom_complet }}" readonly>
                            </div>
                            <div>
                                <strong>OBJET</strong>
                                <input type="text" value="{{ $facture->Objet ?? $demande->objet }}" readonly>
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
                                        <textarea readonly>{{ $facture->Designation ?? '' }}</textarea>
                                    </td>
                                    <td>
                                        <textarea readonly>{{ $facture->Montant ?? '' }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="text-align:right;">TOTAL</th>
                                    <th>
                                        <input type="text" value="{{ $facture->Total ?? '' }}" readonly>
                                    </th>
                                </tr>
                            </tbody>
                        </table>

                        <p><strong>Arrêté la présente facture à la somme de :</strong></p>
                        <input type="text" value="{{ $facture->Total_lettres ?? '' }}" readonly>

                        <br><br><br>

                        <div class="footer-grid">
                            <div class="footer-left">
                                <strong>Direction Générale</strong>
                                <p>16 rue Laptot Matouffa Mpila</p>
                                Centre-ville, Brazzaville
                            </div>
                            <div class="footer-right">
                                <strong>Pointe-Noire</strong>
                                Mpita derrière Brasco, Pointe-Noire
                                <p>Tél : (+242) 611 48 51 / (+242) 04 415 48 71</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endif
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
                margin: 0;
                padding: 15mm;
                box-sizing: border-box;
                background: #fff;
            }

            @page {
                size: A4 portrait;
                margin: 0;
            }
        }

        @media print {
            .fiche-a-imprimer.fiche-facture-wrap .fiche-logos {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 5px;
                page-break-inside: avoid;
            }

            .fiche-a-imprimer.fiche-facture-wrap .logo-left,
            .fiche-a-imprimer.fiche-facture-wrap .logo-right {
                width: 65px;
                height: auto;
                margin-bottom: 10px;
            }

            .fiche-a-imprimer.fiche-facture-wrap .header-center h4 {
                font-size: 11px;
                margin: 2px 0;
                font-weight: bold;
                color: #000;
            }

            .fiche-a-imprimer.fiche-facture-wrap input[type="text"],
            .fiche-a-imprimer.fiche-facture-wrap input[type="number"],
            .fiche-a-imprimer.fiche-facture-wrap input[type="date"],
            .fiche-a-imprimer.fiche-facture-wrap textarea {
                background: #ffffff ;
                color: #000000 ;
                border: 1px solid #999 ;
                border-radius: 4px;
                padding: 5px 7px;
                font-size: 12px;
                font-family: Arial, sans-serif;
                width: 100%;
                box-sizing: border-box;
                -webkit-appearance: none;
                appearance: none;
            }

            .fiche-a-imprimer.fiche-facture-wrap .demande-table textarea,
            .fiche-a-imprimer.fiche-facture-wrap .demande-table input {
                border: none ;
                padding: 0 ;
                background: transparent ;
            }

            .fiche-a-imprimer.fiche-facture-wrap input[type="date"]::-webkit-calendar-picker-indicator {
                display: none;
            }

            .fiche-a-imprimer.fiche-facture-wrap textarea {
                height: 80px;
                overflow: visible;
                resize: none;
            }

            .fiche-a-imprimer.fiche-facture-wrap .demande-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
                font-size: 12px;
            }

            .fiche-a-imprimer.fiche-facture-wrap .demande-table th,
            .fiche-a-imprimer.fiche-facture-wrap .demande-table td {
                border: 1px solid #000;
                padding: 5px 7px;
                vertical-align: top;
            }

            .fiche-a-imprimer.fiche-facture-wrap .demande-table tr {
                page-break-inside: avoid;
            }

            .fiche-a-imprimer.fiche-facture-wrap .footer-grid {
                display: flex;
                justify-content: space-between;
                gap: 20px;
                margin-top: 15px;
                font-size: 11px;
                line-height: 1.5;
            }

            .fiche-a-imprimer.fiche-facture-wrap .footer-left {
                flex: 1;
                text-align: left;
                margin-right: 10px;
            }

            .fiche-a-imprimer.fiche-facture-wrap .footer-right {
                flex: 1;
                text-align: right;
                margin-left: 10px;
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

        function telecharger(btn, wrapClass) {
            document.querySelectorAll('.fiche-a-imprimer').forEach(function(el) {
                el.classList.remove('fiche-a-imprimer');
            });
            var fiche = btn.closest('.modal-box').querySelector('.' + wrapClass);

            if (wrapClass === 'fiche-facture-wrap') {
                fiche.querySelectorAll('input[type="date"]').forEach(function(d) {
                    d.setAttribute('value', d.value);
                });
            }

            fiche.classList.add('fiche-a-imprimer');
            window.print();
            setTimeout(function() {
                fiche.classList.remove('fiche-a-imprimer');
            }, 1000);
        }
    </script>
</x-app-layout>
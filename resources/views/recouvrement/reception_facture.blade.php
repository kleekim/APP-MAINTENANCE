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

        .btn-fermer    { background: #ef4444; }
        .btn-telecharger { background: #006937; }

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
                padding: 0;
                font-family: Arial, sans-serif;
                color: #000;
                background: #fff;
            }

            
            .fiche-a-imprimer .fiche-logos {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 5px;
                page-break-inside: avoid;
            }

            .fiche-a-imprimer .logo-left,
            .fiche-a-imprimer .logo-right {
                width: 65px;
                height: auto;
                margin-bottom: 10px;
            }

            .fiche-a-imprimer .header-center {
                flex: 1;
                text-align: center;
            }

            .fiche-a-imprimer .header-center h4 {
                font-size: 11px;
                margin: 2px 0;
                font-weight: bold;
                color: #000;
            }

            .fiche-a-imprimer input[type="text"],
            .fiche-a-imprimer input[type="number"],
            .fiche-a-imprimer input[type="date"],
            .fiche-a-imprimer textarea {
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

            .fiche-a-imprimer .demande-table textarea,
            .fiche-a-imprimer .demande-table input {
                border: none ;
                padding: 0 ;
                background: transparent ;
            }

           
            .fiche-a-imprimer input[type="date"]::-webkit-calendar-picker-indicator {
                display: none;
            }

            .fiche-a-imprimer textarea {
                height: 80px;
                overflow: visible;
                resize: none;
            }

        
            .fiche-a-imprimer .demande-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
                font-size: 12px;
            }

            .fiche-a-imprimer .demande-table th,
            .fiche-a-imprimer .demande-table td {
                border: 1px solid #000;
                padding: 5px 7px;
                vertical-align: top;
            }

            .fiche-a-imprimer .demande-table tr {
                page-break-inside: avoid;
            }

            
            .fiche-a-imprimer .footer-grid {
                display: flex;
                justify-content: space-between;
                gap: 20px;
                margin-top: 15px;
                font-size: 11px;
                line-height: 1.5;
            }

            .fiche-a-imprimer .footer-left { flex: 1; text-align: left; margin-right: 10px; }
            .fiche-a-imprimer .footer-right { flex: 1; text-align: right; margin-left: 10px; }

            @page {
                size: A4 portrait;
                margin: 12mm;
            }

            * {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>

  
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Liste des Factures clients</h2>
            </div>

            <div class="mb-4 flex items-center gap-3">
                <input type="text" id="userSearch" placeholder="Rechercher un client..."
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
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Panne</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Date</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Statut</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Action</th>
                        </tr>
                    </thead>
                    <tbody id="facturesTableBody">
                        @forelse($factures as $index => $facture)
                            <tr class="border-t border-gray-200 hover:bg-green-50 transition-colors facture-row">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                    {{ $facture->demande->nom_complet }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $facture->demande->panne }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                    {{ $facture->created_at->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full
                                        @if ($facture->statut == 'en_attente') bg-yellow-100 text-yellow-800
                                        @elseif($facture->statut == 'approuvé') bg-green-100 text-green-800
                                        @elseif($facture->statut == 'en_cours') bg-blue-100 text-blue-800
                                        @elseif($facture->statut == 'terminé') bg-gray-100 text-gray-800
                                        @else bg-gray-100 text-gray-800 @endif">
                                        {{ ucfirst($facture->statut) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">
                                    <button onclick="ouvrirModal('modal-facture-{{ $facture->id }}')"
                                        style="background-color:#006937; color:#ffffff; padding:6px 16px; font-size:14px; font-weight:600; border-radius:8px; border:none; cursor:pointer;"
                                        onmouseover="this.style.backgroundColor='#005a2e'"
                                        onmouseout="this.style.backgroundColor='#006937'">
                                        Voir la facture
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-sm text-gray-400 text-center">Aucune facture
                                    trouvée.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    @foreach ($factures as $facture)
        @php $demande = $facture->demande; @endphp

        <div id="modal-facture-{{ $facture->id }}" class="modal-overlay"
            onclick="if(event.target===this) fermerModal('modal-facture-{{ $facture->id }}')">
            <div class="modal-box">

                <div class="modal-topbar">
                    <button class="btn-fermer"
                        onclick="fermerModal('modal-facture-{{ $facture->id }}')">✕ Fermer</button>
                    <button class="btn-telecharger" onclick="telecharger(this)">Télécharger</button>
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
    @endforeach

   
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

           
            var fiche = btn.closest('.modal-box').querySelector('.fiche-facture-wrap');

            
            fiche.querySelectorAll('input[type="date"]').forEach(function(d) {
                d.setAttribute('value', d.value);
            });

            fiche.classList.add('fiche-a-imprimer');

            window.print();

            setTimeout(function() {
                fiche.classList.remove('fiche-a-imprimer');
            }, 1000);
        }

        function filterTable(query) {
            const rows = document.querySelectorAll('#facturesTableBody .facture-row');
            const q = query.toLowerCase().trim();
            rows.forEach(row => {
                row.style.display = (!q || row.innerText.toLowerCase().includes(q)) ? '' : 'none';
            });
        }
    </script>

</x-app-layout>
<x-app-layout>
    <x-slot name="header"></x-slot>

    <style>
        .cc-page {
            background: #f8fafc;
            min-height: 100vh;
            width: 100%;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        .cc-content {
            width: 100%;
            padding: 32px 40px;
        }

        .welcome-banner {
            background: linear-gradient(160deg, #0d2e12 0%, #1a5c24 100%);
            border-radius: 16px;
            padding: 32px 36px;
            margin-bottom: 24px;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .welcome-banner h1 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .welcome-banner p {
            font-size: 14px;
            opacity: .75;
            line-height: 1.65;
        }

        .wbtn {
            background: #2563eb;
            color: #fff;
            border: none;
            padding: 11px 22px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-top: 16px;
            transition: background .2s;
        }

        .wbtn:hover {
            background: #1d4ed8;
            color: #fff;
        }

        .banner-visual {
            width: 80px;
            height: 80px;
            flex-shrink: 0;
            background: rgba(255, 255, 255, .08);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
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

        .kpi-ico {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            width: 100%;
        }

        .db-card {
            background: #fff;
            border-radius: 14px;
            border: 1px solid #e8ecf0;
            padding: 24px;
        }

        .db-card h3 {
            font-size: 15px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 18px;
        }

        .info-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-size: 13px;
            color: #6b7280;
        }

        .info-val {
            font-size: 13px;
            font-weight: 600;
            color: #111827;
        }

        .action-btn {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 16px;
            border-radius: 11px;
            border: 1px solid #e8ecf0;
            background: #f9fafb;
            margin-bottom: 12px;
            text-decoration: none;
            transition: border-color .15s, background .15s, transform .1s;
        }

        .action-btn:last-child {
            margin-bottom: 0;
        }

        .action-btn:hover {
            border-color: #16a34a;
            background: #dcfce7;
            transform: translateX(2px);
        }

        .action-btn:focus,
        .action-btn:active,
        .action-btn:focus-visible,
        a.action-btn:focus,
        a.action-btn:active,
        .wbtn:focus,
        .wbtn:active,
        .wbtn:focus-visible {
            outline: none;
            box-shadow: 0 0 0 3px rgba(4, 120, 87, 0.18) ;
            border-color: #006937 ;
            background: #dcfce7 ;
            color: inherit ;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none ;
            box-shadow: 0 0 0 3px rgba(4, 120, 87, 0.12) ;
            border-color: #006937 ;
        }

        .ab-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .ab-t {
            font-size: 14px;
            font-weight: 600;
            color: #111827;
        }

        .ab-s {
            font-size: 12px;
            color: #6b7280;
            margin-top: 3px;
        }

        .ab-arrow {
            margin-left: auto;
            color: #d1d5db;
            flex-shrink: 0;
        }

        .action-btn:hover .ab-arrow {
            color: #2563eb;
        }

        @media(max-width: 768px) {

            .kpi-grid,
            .cards-grid {
                grid-template-columns: 1fr;
            }

            .cc-content {
                padding: 20px 16px;
            }

            .welcome-banner {
                padding: 24px 20px;
            }

            .banner-visual {
                display: none;
            }
        }
    </style>

    <div class="cc-page">
        <div class="cc-content">

            <div class="welcome-banner">
                <div>
                    <h1>Bonjour, {{ auth()->user()->name }} </h1>
                    <p>Suivez vos interventions planifiées et consultez votre contrat en cours.</p>
                </div>
                <div class="banner-visual">
                    <svg width="38" height="38" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <br>
            <br>
            <br>



            <div class="cards-grid">
                <div class="db-card">
                    <h3>Prochaine intervention</h3>
                    <div class="info-row">
                        <span class="info-label">Date prévue</span>
                        <span class="info-val">{{ $prochaineIntervention ?? 'Aucune planifiée' }}</span>
                    </div>
                    
                    <div style="margin-top:16px;">
                        <a href="#" class="action-btn">
                            <div class="ab-icon" style="background:#dcfce7;">
                                <svg width="18" height="18" fill="none" stroke="#006937" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <div class="ab-t">Voir le planning complet</div>
                                <div class="ab-s">Toutes vos interventions programmées</div>
                            </div>
                            <svg class="ab-arrow" width="16" height="16" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path d="M9 18l6-6-6-6" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="db-card">
                    <h3>Mon contrat</h3>
                    <div class="info-row">
                        <span class="info-label">Contrat actif</span>
                        <span class="info-val">{{ $contratEnCours ?? 'Aucun' }}</span>
                    </div>
                    
                    <div style="margin-top:16px;">
                        <a href="#" class="action-btn">
                            <div class="ab-icon" style="background:#dcfce7;">
                                <svg width="18" height="18" fill="none" stroke="#006937" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <div class="ab-t">Consulter mes contrats</div>
                                <div class="ab-s">Voir les détails de votre contrat</div>
                            </div>
                            <svg class="ab-arrow" width="16" height="16" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path d="M9 18l6-6-6-6" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header"></x-slot>

    <style>
        .rec-page {
            background: #f8fafc;
            min-height: 100vh;
            width: 100%;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        .rec-content {
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

            text-align: center;
        }

        .welcome-banner>div:first-child {
            flex: 1;
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
            grid-template-columns: repeat(2, 1fr);
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

        .db-card {
            background: #fff;
            border-radius: 14px;
            border: 1px solid #e8ecf0;
            padding: 24px;
            width: 100%;
        }

        .db-card h3 {
            font-size: 15px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 18px;
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
            outline: none;

            -webkit-tap-highlight-color: transparent;

        }

        .action-btn:hover {
            border-color: #16a34a;
            background: #dcfce7;
            transform: translateX(2px);
        }

        .action-btn:focus,
        .action-btn:active,
        .action-btn:focus-visible {
            outline: none;
            box-shadow: none;
            background: #dcfce7;
            border-color: #16a34a;
            color: inherit;
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
            color: #16a34a;
        }

        @media(max-width: 768px) {
            .kpi-grid {
                grid-template-columns: 1fr;
            }

            .rec-content {
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

    <div class="rec-page">
        <div class="rec-content">

            <div class="welcome-banner">
                <div>
                    <h1>Tableau de bord — Recouvrement</h1>
                    <center>
                        <p>Suivez et gérez les factures clients de la plateforme ACSI Maintenance</p>
                    </center>
                </div>
                <div class="banner-visual">
                    <svg width="38" height="38" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path
                            d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" />
                    </svg>
                </div>
            </div>


            <div class="kpi-grid">

                <div class="kpi-card" style="border-top: 3px solid #f7be00;">
                    <div>
                        <div class="klabel">Nombre Total des Factures</div>
                        <div class="kval">{{ $totalFactures ?? 0 }}</div>
                    </div>
                </div>

                <div class="kpi-card" style="border-top: 3px solid #ae1410;">
                    <div>
                        <div class="klabel">Montant Total Facturé</div>
                        <div class="kval">{{ number_format($totalAmount ?? 0, 0, ',', ' ') }} FCFA</div>
                    </div>
                </div>
            </div>

            <div class="db-card">
                <h3>Actions rapides</h3>
                <a href="{{ route('recouvrement.reception_facture') }}" class="action-btn">
                    <span
                        style="width:42px;height:42px;border-radius:11px;background:rgba(0,105,55,0.12);border:1px solid rgba(0,105,55,0.25);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <svg width="24" height="24" fill="none" stroke="#006937" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path
                                d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" />
                        </svg>
                    </span>
                    <div>
                        <div class="ab-t">Consulter les factures</div>
                        <div class="ab-s">liste complète des factures</div>
                    </div>
                    <svg class="ab-arrow" width="16" height="16" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 18l6-6-6-6" />
                    </svg>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>

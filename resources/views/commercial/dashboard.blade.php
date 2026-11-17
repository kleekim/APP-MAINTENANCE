<x-app-layout>
    <x-slot name="header"></x-slot>


    <style>
        .comm-page {
            background: #f8fafc;
            min-height: 100vh;
            width: 100%;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        .comm-content {
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
            max-width: 500px;
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


        .badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 11px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .b-green {
            background: #dcfce7;
            color: #15803d;
        }

        .b-amber {
            background: #fef3c7;
            color: #b45309;
        }

        .b-red {
            background: #fee2e2;
            color: #b91c1c;
        }

        .b-darkgreen {
            background: #d1fae5;
            color: #0d2e12;
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
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .db-card h3 a {
            font-size: 12px;
            font-weight: 500;
            color: #006937;
            text-decoration: none;
        }

        .db-card h3 a:hover {
            text-decoration: underline;
        }

        .statut-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .statut-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .statut-item:first-child {
            padding-top: 0;
        }

        .statut-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .statut-name {
            flex: 1;
            font-size: 13.5px;
            font-weight: 600;
            color: #111827;
        }

        .statut-count {
            font-size: 12px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
        }


        .activity-row {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .activity-row:last-child {
            border-bottom: none;
        }

        .activity-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            flex-shrink: 0;
            margin-top: 5px;
        }

        .activity-t {
            font-size: 13px;
            font-weight: 600;
            color: #111827;
        }

        .activity-s {
            font-size: 11px;
            color: #9ca3af;
            margin-top: 3px;
        }

        @media(max-width: 768px) {

            .kpi-grid,
            .cards-grid {
                grid-template-columns: 1fr;
            }

            .comm-content {
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

    <div class="comm-page">
        <div class="comm-content">


            <div class="welcome-banner">
                <div>
                    <h1>Tableau de bord — Commercial</h1>
                    <center>
                        <p>Gérez les demandes de maintenance et la facturation des clients ACSI</p>
                    </center>
                </div>
                <div class="banner-visual">
                    <svg width="38" height="38" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path
                            d="M3 10h18M6 14h6m-6 4h12M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z" />
                    </svg>
                </div>
            </div>


            <div class="kpi-grid">
                <div class="kpi-card" style="border-top: 3px solid #006937;">
                    <div>
                        <div class="klabel">Fiches Accueil</div>
                        <div class="kval">{{ $totalfiches_accueils ?? 0 }}</div>
                        <div class="ksub">Total créées</div>
                    </div>
                </div>

                <div class="kpi-card" style="border-top: 3px solid #f7be00;">
                    <div>
                        <div class="klabel">Fiches Interventions</div>
                        <div class="kval">{{ $totalfiches_interventions ?? 0 }}</div>
                        <div class="ksub">Total traitées</div>
                    </div>
                </div>

                <div class="kpi-card" style="border-top: 3px solid #ae1410;">
                    <div>
                        <div class="klabel">Factures créées</div>
                        <div class="kval">{{ $totalfactures ?? 0 }}</div>
                        <div class="ksub">Total émises</div>
                    </div>
                </div>
            </div>
            <br>
            <br>

            <div class="cards-grid">

                <div class="db-card">
                    <h3>Répartition des demandes</h3>

                    <div class="statut-item">
                        <div class="statut-dot" style="background:#ae1410;"></div>
                        <span class="statut-name">En attente</span>
                        <span class="statut-count" style="background:#fee2e2; color:#ae1410;">
                            {{ $demandesAttente ?? 0 }}
                        </span>
                    </div>

                    <div class="statut-item">
                        <div class="statut-dot" style="background:#f7be00;"></div>
                        <span class="statut-name">En cours</span>
                        <span class="statut-count" style="background:#fef3c7; color:#9a3412;">
                            {{ $demandesEnCours ?? 0 }}
                        </span>
                    </div>

                    <div class="statut-item">
                        <div class="statut-dot" style="background:#22c55e;"></div>
                        <span class="statut-name">Approuvé</span>
                        <span class="statut-count" style="background:#dcfce7; color:#15803d;">
                            {{ $demandesApprouvees ?? 0 }}
                        </span>
                    </div>

                    <div class="statut-item">
                        <div class="statut-dot" style="background:#006937;"></div>
                        <span class="statut-name">Terminé</span>
                        <span class="statut-count" style="background:#d1fae5; color:#006937;">
                            {{ $demandesTerminees ?? 0 }}
                        </span>
                    </div>

                </div>

                <div class="db-card">
                    <h3>Activité récente</h3>

                    <div class="activity-row">
                        <div class="activity-dot" style="background:#16a34a;"></div>
                        <div>
                            <div class="activity-t">Nouvelles demandes cette semaine</div>
                            <div class="activity-s">
                                <span class="badge b-green">{{ $demandesSemaine ?? 0 }} demandes</span>
                            </div>
                        </div>
                    </div>

                    <div class="activity-row">
                        <div class="activity-dot" style="background:#0d2e12;"></div>
                        <div>
                            <div class="activity-t">Interventions clôturées</div>
                            <div class="activity-s">
                                <span class="badge b-darkgreen">{{ $interventionsSemaine ?? 0 }} cette semaine</span>
                            </div>
                        </div>
                    </div>

                    <div class="activity-row">
                        <div class="activity-dot" style="background:#ae1410;"></div>
                        <div>
                            <div class="activity-t">Nouveaux clients inscrits</div>
                            <div class="activity-s">
                                <span class="badge b-red">{{ $nouveauxClients ?? 0 }} ce mois</span>
                            </div>
                        </div>
                    </div>

                    <div class="activity-row">
                        <div class="activity-dot" style="background:#f7be00;"></div>
                        <div>
                            <div class="activity-t">Factures émises</div>
                            <div class="activity-s">
                                <span class="badge b-amber">{{ $facturesMois ?? 0 }} ce mois</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>
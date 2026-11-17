<x-app-layout>
    <x-slot name="header"></x-slot>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .admin-page {
            background: #f8fafc;
            min-height: 100vh;
            width: 100%;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        .admin-content {
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


        .chart-box {
            width: 320px;
            height: 320px;
            margin: 0 auto;
        }

        @media(max-width: 768px) {

            .kpi-grid,
            .cards-grid {
                grid-template-columns: 1fr;
            }

            .admin-content {
                padding: 20px 16px;
            }

            .welcome-banner {
                padding: 24px 20px;
            }

            .banner-visual {
                display: none;
            }

            .chart-box {
                width: 250px;
                height: 250px;
            }
        }
    </style>

    <div class="admin-page">
        <div class="admin-content">


            <div class="welcome-banner">
                <div>
                    <h1>Tableau de bord — Administrateur</h1>
                    <center>
                        <p>Vue d'ensemble de l'activité de la plateforme ACSI • Pointe-Noire</p>
                    </center>
                </div>

                <div class="banner-visual">
                    <svg width="38" height="38" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path
                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>


            <div class="kpi-grid">

                <div class="kpi-card" style="border-top: 3px solid #006937;">
                    <div>
                        <div class="klabel">Utilisateurs</div>
                        <div class="kval">{{ $totalUsers }}</div>
                        <div class="ksub">Total inscrits</div>
                    </div>

                    <div class="kpi-ico" style="background:#dcfce7;">
                        <svg width="24" height="24" fill="none" stroke="#006937" stroke-width="2"
                            viewBox="0 0 24 24">
                            <circle cx="8" cy="7" r="4" />
                            <path d="M2 21v-1a6 6 0 016-6h2" />
                            <line x1="19" y1="11" x2="19" y2="19" />
                            <line x1="15" y1="15" x2="23" y2="15" />
                        </svg>
                    </div>
                </div>

                <div class="kpi-card" style="border-top: 3px solid #f7be00;">
                    <div>
                        <div class="klabel">Clients</div>
                        <div class="kval">{{ $totalClients }}</div>
                        <div class="ksub">Particuliers & contractuels</div>
                    </div>
                    <div class="kpi-ico" style="background:#fef3c7;">
                        <svg width="24" height="24" fill="none" stroke="#f7be00" stroke-width="2"
                            viewBox="0 0 24 24">
                            <circle cx="8" cy="7" r="4" />
                            <path d="M2 21v-1a6 6 0 016-6h1" />
                            <circle cx="17" cy="8" r="3" />
                            <path d="M13 21v-1a4 4 0 018 0v1" />
                        </svg>
                    </div>
                </div>

                <div class="kpi-card" style="border-top: 3px solid #ae1410;">
                    <div>
                        <div class="klabel">Demandes</div>
                        <div class="kval">{{ $totalDemandes ?? 0 }}</div>
                        <div class="ksub">Demandes reçues</div>
                    </div>

                    <div class="kpi-ico" style="background:#fee2e2;">
                        <svg width="24" height="24" fill="none" stroke="#ae1410" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8Z" />
                            <path d="M14 2v6h6" />
                            <line x1="8" y1="13" x2="16" y2="13" />
                            <line x1="8" y1="17" x2="16" y2="17" />
                        </svg>
                    </div>
                </div>

            </div>


            <div class="cards-grid">

                <div class="db-card">
                    <h3>Évolution des demandes par mois</h3>
                    <canvas id="demandesChart"></canvas>
                </div>

                <div class="db-card">
                    <h3>Répartition des demandes par statut</h3>

                    <div class="chart-box">
                        <canvas id="statutChart"></canvas>
                    </div>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>

<script>
    const demandesData = {
        labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
        datasets: [{
            label: 'Demandes reçues',
            data: @json($chartDemandes),
            borderColor: '#006937',
            backgroundColor: 'rgba(0, 105, 55, 0.08)',
            tension: 0.3,
            fill: true,
            pointBackgroundColor: '#006937',
            pointRadius: 4,
        }]
    };

    const statutData = {
        labels: @json($statutsFormatted->keys()),
        datasets: [{
            data: @json($statutsFormatted->values()),
            backgroundColor: ['#ef4444', '#f97316', '#22c55e', '#006937'],
            borderColor: '#ffffff',
            borderWidth: 3,
            hoverOffset: 8,
        }]
    };

    window.onload = function() {

        new Chart(document.getElementById('demandesChart'), {
            type: 'line',
            data: demandesData,
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        new Chart(document.getElementById('statutChart'), {
            type: 'doughnut',
            data: statutData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: { size: 14, weight: '600' },
                            color: '#111827',
                            padding: 16,
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    },
                    tooltip: {
                        bodyFont: { size: 14 },
                        titleFont: { size: 14 }
                    }
                }
            }
        });

    };
</script>


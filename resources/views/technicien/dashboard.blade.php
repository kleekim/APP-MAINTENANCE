<x-app-layout>
    <x-slot name="header"></x-slot>

    <style>
        .tech-page {
            background: #f8fafc;
            min-height: 100vh;
            width: 100%;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        .tech-content {
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

        .cards-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            width: 100%;
        }


        .cards-grid>.db-card {
            height: 340px;
            display: flex;
            flex-direction: column;
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
            gap: 10px;
            flex-shrink: 0;
        }

        .db-card h3 .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            flex-shrink: 0;
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
            flex-shrink: 0;
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
            color: #2563eb;
        }

        .panne-card {
            overflow-y: auto;
        }

        .panne-period {
            margin-left: auto;
            font-size: 12px;
            font-weight: 500;
            color: #6b7280;
            background: #f1f5f9;
            padding: 3px 10px;
            border-radius: 20px;
        }

        .panne-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .panne-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .panne-item:first-child {
            padding-top: 0;
        }

        .panne-rank {
            width: 24px;
            height: 24px;
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .panne-label {
            flex: 1;
            min-width: 0;
            font-size: 13.5px;
            font-weight: 600;
            color: #111827;
            text-transform: capitalize;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .panne-badge {
            font-size: 11.5px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
            flex-shrink: 0;
        }

        .panne-empty {
            text-align: center;
            padding: 20px 0 4px;
        }

        .panne-empty p {
            font-size: 13px;
            color: #6b7280;
            margin-top: 8px;
        }

      
        .evolution-card {
            display: flex;
            flex-direction: column;
        }

        .evolution-card canvas {
            flex: 1;
            width: 100%;
            height: 100%;
        }

       
        .cards-grid > .split-card {
            flex-direction: row;
            gap: 16px;
            overflow: hidden;
        }

        .split-left {
            flex: 0 0 42%;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .split-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 0;
            border-left: 1px dashed #e8ecf0;
            padding-left: 18px;
            overflow-y: auto;
        }

        
        .stat-mini {
            background: #f9fafb;
            border: 1px solid #e8ecf0;
            border-radius: 11px;
            padding: 14px 16px;
            display: flex;
            align-items: center;
            gap: 14px;
            flex: 1;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #dcfce7;
            color: #16a34a;
            flex-shrink: 0;
        }

        .stat-body {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .stat-label {
            font-size: 13px;
            font-weight: 600;
            color: #6b7280;
        }

        .stat-value {
            font-size: 22px;
            font-weight: 700;
            color: #111827;
            line-height: 1;
        }

        .materiel-header {
            display: flex;
            flex-direction: column;
            gap: 3px;
            margin-bottom: 12px;
            flex-shrink: 0;
        }

        .materiel-label {
            font-size: 14px;
            font-weight: 700;
            color: #111827;
        }

        .materiel-sub {
            font-size: 12px;
            color: #9ca3af;
        }

        .materiel-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .materiel-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .materiel-item:first-child {
            padding-top: 0;
        }

        .materiel-icon {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            background: #dcfce7;
            color: #16a34a;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .materiel-name {
            flex: 1;
            min-width: 0;
            font-size: 13px;
            font-weight: 600;
            color: #111827;
            text-transform: capitalize;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .materiel-count {
            font-size: 12px;
            font-weight: 700;
            color: #16a34a;
            background: #dcfce7;
            padding: 3px 10px;
            border-radius: 20px;
            flex-shrink: 0;
        }

        .materiel-empty {
            text-align: center;
            padding: 20px 0 4px;
            color: #6b7280;
            font-size: 13px;
        }

        @media(max-width: 768px) {

            .kpi-grid,
            .cards-grid {
                grid-template-columns: 1fr;
            }

            .cards-grid>.db-card {
                height: auto;
            }

            .tech-content {
                padding: 20px 16px;
            }

            .welcome-banner {
                padding: 24px 20px;
            }

            .banner-visual {
                display: none;
            }

            .cards-grid > .split-card {
                flex-direction: column;
            }

            .split-right {
                border-left: none;
                border-top: 1px dashed #e8ecf0;
                padding-left: 0;
                padding-top: 16px;
            }
        }
    </style>

    <div class="tech-page">
        <div class="tech-content">

            <div class="welcome-banner">
                <div>
                    <h1>Tableau de bord — Technicien</h1>
                    <center>
                        <p>Gérez vos interventions, établissez vos diagnostics et planifiez vos missions</p>
                    </center>
                </div>
                <div class="banner-visual">
                    <svg width="38" height="38" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path
                            d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z" />
                    </svg>
                </div>
            </div>
            <br>
            <br>
            <br>

            <div class="cards-grid">

                <div class="db-card" style="border-top: 3px solid #006937;">
                    <h3>
                        <div class="dot" style="background:#006937;"></div>
                        Clients particuliers
                    </h3>
                    <a href="{{ route('technicien.liste_client') }}" class="action-btn">
                        <span
                            style="width:42px;height:42px;border-radius:11px;background:rgba(0,105,55,0.12);border:1px solid rgba(0,105,55,0.25);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <svg width="24" height="24" fill="none" stroke="#006937" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </span>
                        <div>
                            <div class="ab-t">Liste clients</div>
                            <div class="ab-s">Voir tous les clients particuliers</div>
                        </div>
                        <svg class="ab-arrow" width="16" height="16" fill="none" stroke="#006937"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path d="M9 18l6-6-6-6" />
                        </svg>
                    </a>
                    <a href="{{ route('technicien.diagnostic') }}" class="action-btn">
                        <span
                            style="width:42px;height:42px;border-radius:11px;background:rgba(0,105,55,0.12);border:1px solid rgba(0,105,55,0.25);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <svg width="24" height="24" fill="none" stroke="#006937" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </span>
                        <div>
                            <div class="ab-t">Établir un diagnostic</div>
                            <div class="ab-s">Créer un diagnostic client</div>
                        </div>
                        <svg class="ab-arrow" width="16" height="16" fill="none" stroke="#006937"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path d="M9 18l6-6-6-6" />
                        </svg>
                    </a>
                </div>


                <div class="db-card" style="border-top: 3px solid #f7be00;">
                    <h3>
                        <div class="dot" style="background:#f7be00;"></div>
                        Clients sous contrat
                    </h3>
                    <a href="{{ route('technicien.Contractuels') }}" class="action-btn">
                        <span
                            style="width:42px;height:42px;border-radius:11px;background:rgba(247,190,0,0.12);border:1px solid rgba(247,190,0,0.25);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <svg width="24" height="24" fill="none" stroke="#f7be00" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </span>
                        <div>
                            <div class="ab-t">Liste clients</div>
                            <div class="ab-s">Voir tous les clients contractuels</div>
                        </div>
                        <svg class="ab-arrow" width="16" height="16" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path d="M9 18l6-6-6-6" />
                        </svg>
                    </a>
                </div>

               
                <div class="db-card evolution-card" style="border-top: 3px solid #dc2626;">
                    <h3>
                        <div class="dot" style="background:#dc2626;"></div>
                       Nombre de pannes journalière
                    </h3>

                    @if(array_sum($evolutionValeurs) > 0)
                        <canvas id="evolutionChart"></canvas>
                    @else
                        <div class="panne-empty">
                            <svg width="28" height="28" fill="none" stroke="#cbd5e1" stroke-width="1.5"
                                viewBox="0 0 24 24">
                                <path
                                    d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V18a2 2 0 01-2 2z" />
                            </svg>
                            <p>Aucune donnée de panne </p>
                        </div>
                    @endif
                </div>

                
                <div class="db-card split-card">
                    <div class="split-left">
                        <div class="stat-mini">

                            <div class="stat-body">
                                <p class="stat-label">Intervention en cours</p>
                                <p class="stat-value">{{ $enCours }}</p>
                            </div>
                        </div>

                        <div class="stat-mini">

                            <div class="stat-body">
                                <p class="stat-label">Interventions terminées</p>
                                <p class="stat-value">{{ $terminees }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="split-right">
                        <div class="materiel-header">
                            <span class="materiel-label">Matériels frequement en panne</span>
                            <span class="materiel-sub">30 derniers jours</span>
                        </div>

                        @forelse($materielLabels as $index => $materiel)
                            <div class="materiel-item">
                                <span class="materiel-name">{{ $materiel }}</span>
                                <span class="materiel-count">{{ $materielValeurs[$index] }} cas</span>
                            </div>
                        @empty
                            <div class="materiel-empty">
                                Aucune donnée de matériel sur les 30 derniers jours.
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>

        </div>
    </div>

    @if(array_sum($evolutionValeurs) > 0)
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const ctx = document.getElementById('evolutionChart');
                if (!ctx) return;

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($evolutionLabels) !!},
                        datasets: [{
                            label: 'Pannes',
                            data: {!! json_encode($evolutionValeurs) !!},
                            borderColor: '#dc2626',
                            backgroundColor: 'rgba(220, 38, 38, 0.1)',
                            fill: true,
                            tension: 0.3,
                            pointRadius: 2,
                            pointHoverRadius: 5,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: { stepSize: 1 }
                            },
                            x: {
                                ticks: { autoSkip: true, maxTicksLimit: 10 }
                            }
                        }
                    }
                });
            });
        </script>
    @endif
</x-app-layout>
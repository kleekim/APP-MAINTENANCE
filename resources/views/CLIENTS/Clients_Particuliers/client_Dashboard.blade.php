<x-app-layout>
    <x-slot name="header"></x-slot>

    <style>
        .client-page {
            background: #f8fafc;
            min-height: 100vh;
            width: 100%;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        .client-content {
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
            gap: 18px;
            margin-bottom: 24px;
        }

        .kpi-card {
            background: #fff;
            border-radius: 14px;
            border: 1px solid #e8ecf0;
            padding: 20px 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06);
            transition: box-shadow 0.2s;
        }

        .kpi-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.10);
        }

        .klabel {
            font-size: 12px;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            margin-bottom: 4px;
        }

        .kval {
            font-size: 28px;
            font-weight: 800;
            color: #111827;
            line-height: 1;
        }

        .ksub {
            font-size: 11px;
            color: #9ca3af;
            margin-top: 4px;
        }

        .kpi-ico {
            width: 48px;
            height: 48px;
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
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .db-card h3 {
            font-size: 15px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
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
            color: inherit;
            transition: all 0.2s ease;
            outline: none ;
            -webkit-tap-highlight-color: transparent;
        }

        .action-btn:last-child {
            margin-bottom: 0;
        }

        .action-btn:hover {
            border-color: #16a34a;
            background: #dcfce7;
            transform: translateX(2px);
            color: inherit;
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
            transition: transform 0.2s;
        }

        .action-btn:hover .ab-arrow {
            color: #0d2e12;
            transform: translateX(2px);
        }

        .activity-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #f3f4f6;
            margin-bottom: 10px;
            transition: background 0.2s;
        }

        .activity-item:hover {
            background: #f8fafc;
        }

        .activity-item:last-child {
            margin-bottom: 0;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .status-dot.pending {
            background: #f59e0b;
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
        }

        .status-dot.completed {
            background: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .status-dot.progress {
            background: #9a3412;
            box-shadow: 0 0 0 3px rgba(154, 52, 18, 0.1);
        }

        .act-info {
            flex: 1;
        }

        .act-title {
            font-size: 13px;
            font-weight: 600;
            color: #111827;
        }

        .act-time {
            font-size: 11px;
            color: #9ca3af;
            margin-top: 2px;
        }

        .act-badge {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            padding: 4px 8px;
            border-radius: 6px;
            letter-spacing: 0.5px;
        }

        .act-badge.pending {
            background: #fef3c7;
            color: #92400e;
        }

        .act-badge.completed {
            background: #d1fae5;
            color: #065f46;
        }

        .act-badge.progress {
            background: #fed7aa;
            color: #9a3412;
        }


        .bottom-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-top: 24px;
        }

        .bottom-card {
            background: #fff;
            border-radius: 14px;
            border: 1px solid #e8ecf0;
            padding: 20px;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .bottom-card h3 {
            font-size: 14px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }


        .support-card {
            margin-top: 24px;
            background: #fff;
            border-radius: 14px;
            border: 1px solid #e8ecf0;
            padding: 24px;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .support-card h3 {
            font-size: 15px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        @media (max-width: 992px) {
            .bottom-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .client-content {
                padding: 20px 16px;
            }

            .welcome-banner {
                padding: 24px 20px;
            }

            .banner-visual {
                display: none;
            }

            .kpi-grid {
                grid-template-columns: 1fr;
            }

            .cards-grid {
                grid-template-columns: 1fr;
            }

            .bottom-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="client-page">
        <div class="client-content">


            <div class="welcome-banner">
                <div>
                    <h1>Bonjour, {{ auth()->user()->name }}</h1>
                    <center>
                        <p>Bienvenue sur votre espace client ACSI. Signalez vos pannes et suivez chaque intervention en
                            temps réel.</p>
                    </center>
                </div>
                <div class="banner-visual">
                    <svg width="38" height="38" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path
                            d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76Z" />
                    </svg>
                </div>
            </div>


            <div class="kpi-grid">

                <div class="kpi-card" style="border-top: 3px solid #006937;">
                    <div>
                        <div class="klabel">Total demandes</div>
                        <div class="kval" style="color:#006937;">{{ $totaldemandes ?? 0 }}</div>
                        <div class="ksub">Demandes soumises</div>
                    </div>

                </div>

                <div class="kpi-card" style="border-top: 3px solid #f7be00;">
                    <div>
                        <div class="klabel">En cours</div>
                        <div class="kval" style="color:#f7be00;">{{ $demandesEnCours ?? 0 }}</div>
                        <div class="ksub">Interventions actives</div>
                    </div>

                </div>

                <div class="kpi-card" style="border-top: 3px solid #ae1410;">
                    <div>
                        <div class="klabel">Terminées</div>
                        <div class="kval" style="color:#ae1410;">{{ $demandesTerminees ?? 0 }}</div>
                        <div class="ksub">Interventions clôturées</div>
                    </div>

                </div>

            </div>
            <br>


            <div class="cards-grid">

                <div class="db-card">
                    <h3>
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Actions rapides
                    </h3>

                    <a href="{{ url('formulaire_demande') }}" class="action-btn">
                        <span
                            style="width:42px;height:42px;border-radius:11px;background:rgba(0,105,55,0.12);border:1px solid rgba(0,105,55,0.25);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <svg width="24" height="24" fill="none" stroke="#006937" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M12 5v14M5 12h14" />
                            </svg>
                        </span>
                        <div>
                            <div class="ab-t">Déclarer une panne</div>
                            <div class="ab-s">Soumettre une nouvelle demande</div>
                        </div>
                        <svg class="ab-arrow" width="16" height="16" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path d="M9 18l6-6-6-6" />
                        </svg>
                    </a>

                    <a href="{{ url('/client/demande') }}" class="action-btn">
                        <span
                            style="width:42px;height:42px;border-radius:11px;background:rgba(0,105,55,0.12);border:1px solid rgba(0,105,55,0.25);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <svg width="24" height="24" fill="none" stroke="#006937" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </span>
                        <div>
                            <div class="ab-t">Mes demandes</div>
                            <div class="ab-s">Consulter le statut de mes demandes</div>
                        </div>
                        <svg class="ab-arrow" width="16" height="16" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path d="M9 18l6-6-6-6" />
                        </svg>
                    </a>
                </div>


                <div class="db-card">
                    <h3>
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Demandes récentes
                    </h3>

                    <div class="activity-list">
                        @forelse($recentDemandes as $demande)
                            @php
                                $statut = strtolower(trim($demande->statut));
                                $statusMap = [
                                    'en_attente' => ['dot' => 'pending', 'badge' => 'pending', 'label' => 'En attente'],
                                    'en attente' => ['dot' => 'pending', 'badge' => 'pending', 'label' => 'En attente'],
                                    'en_cours' => ['dot' => 'progress', 'badge' => 'progress', 'label' => 'En cours'],
                                    'en cours' => ['dot' => 'progress', 'badge' => 'progress', 'label' => 'En cours'],
                                    'approuvé' => ['dot' => 'completed', 'badge' => 'completed', 'label' => 'Approuvé'],
                                    'approuve' => ['dot' => 'completed', 'badge' => 'completed', 'label' => 'Approuvé'],
                                    'terminé' => ['dot' => 'completed', 'badge' => 'completed', 'label' => 'Terminé'],
                                    'termine' => ['dot' => 'completed', 'badge' => 'completed', 'label' => 'Terminé'],
                                ];
                                $s = $statusMap[$statut] ?? [
                                    'dot' => 'pending',
                                    'badge' => 'pending',
                                    'label' => $demande->statut,
                                ];
                            @endphp
                            <div class="activity-item">
                                <div class="status-dot {{ $s['dot'] }}"></div>
                                <div class="act-info">
                                    <div class="act-title">{{ $demande->panne }}</div>
                                    <div class="act-time">{{ $demande->created_at->diffForHumans() }}</div>
                                </div>
                                <span class="act-badge {{ $s['badge'] }}">{{ $s['label'] }}</span>
                            </div>
                        @empty
                            <p style="font-size:13px; color:#9ca3af; text-align:center; padding:20px 0;">
                                Aucune demande pour le moment.
                            </p>
                        @endforelse
                    </div>
                </div>

            </div>

            <br>
            <br>

            <div class="support-card">
                <h3>
                    <i class="fa fa-life-ring"></i> Besoin d'aide ?
                </h3>
                <a href="{{ route('client.message') }}"
                    style="display:inline-block; background:#006937; color:#fff; padding:8px 18px; border-radius:8px; text-decoration:none; font-weight:600; font-size:13px;">
                    <i class="fa fa-envelope"></i> Contacter Un Agent ACSI
                </a>
            </div>



        </div>
    </div>
</x-app-layout>
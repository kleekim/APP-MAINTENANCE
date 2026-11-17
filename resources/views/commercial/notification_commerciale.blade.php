<x-app-layout>
    <x-slot name="header"></x-slot>

    <style>
        :root {
            --acsi-vert: #006937;
            --acsi-bg: #f8fafc;
        }

        body {
            background-color: var(--acsi-bg);
            overflow: hidden;
        }

        .notif-page-wrapper {
            display: flex;
            flex-direction: column;
            height: calc(100vh - 64px);
            padding: 24px;
        }

        .notif-title {
            margin-bottom: 20px;
            flex-shrink: 0;
        }

        .notif-title h1 {
            font-size: 22px;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }

        .notif-scroll-area {
            flex: 1;
            overflow-y: auto;
            padding-right: 10px;
        }

        .notif-scroll-area::-webkit-scrollbar {
            width: 6px;
        }

        .notif-scroll-area::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .notif-item {
            position: relative;
            background: white;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            border-left: 4px solid #006937;
            margin-bottom: 16px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: box-shadow 0.2s;
        }

        .notif-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .notif-header {
            display: flex;
            align-items: center;
            padding: 18px 20px;
            padding-right: 56px;
            cursor: pointer;
            user-select: none;
        }

        .notif-icon-box {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #fff;
            color: #2f7018;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 18px;
            flex-shrink: 0;
            border: 1px solid #e2e8f0;
        }

        .notif-header-info {
            flex: 1;
        }

        .notif-header-line {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notif-subject {
            font-weight: 700;
            color: #1e293b;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .badge-unread {
            background: #dc3545;
            color: white;
            font-size: 10px;
            padding: 2px 8px;
            border-radius: 10px;
            font-weight: 600;
        }

        .notif-time {
            font-size: 12px;
            color: #94a3b8;
        }

        .notif-preview {
            font-size: 13px;
            color: #64748b;
            margin-top: 3px;
            white-space: normal;
            word-break: break-word;
        }

        .notif-chevron {
            color: #94a3b8;
            display: flex;
            align-items: center;
            margin-left: 14px;
            transition: transform 0.25s ease;
            flex-shrink: 0;
        }

        .notif-item.open .notif-chevron {
            transform: rotate(180deg);
        }

        .btn-delete-notif-form {
            position: absolute;
            top: 14px;
            right: 14px;
            margin: 0;
        }

        .btn-delete-notif {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 17px;
            padding: 6px 8px;
            border-radius: 8px;
            color: #94a3b8;
            transition: color 0.2s, background 0.2s;
            line-height: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-delete-notif:hover {
            color: #dc3545;
            background: #a72618;
        }

        .notif-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s ease, padding 0.25s ease;
            padding: 0 20px;
        }

        .notif-item.open .notif-body {
            max-height: 600px;
            padding: 0 20px 20px 20px;
        }

        .notif-body-inner {
            border-top: 1px solid #e2e8f0;
            padding-top: 16px;
        }

        .detail-row {
            display: flex;
            align-items: flex-start;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .detail-label {
            font-weight: 600;
            color: #475569;
            width: 130px;
            flex-shrink: 0;
        }

        .detail-value {
            color: #1e293b;
        }

        .actions {
            display: flex;
            gap: 8px;
            margin-top: 16px;
            flex-wrap: wrap;
            align-items: center;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 7px 16px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 500;
            color: #fff;
            text-decoration: none;
            border: none;
            cursor: pointer;
            height: 34px;
        }

        .btn-approve {
            background: #28a745;
        }

        .btn-disabled {
            background: #95a5a6;
            cursor: not-allowed;
            pointer-events: none;
        }

        .actions form {
            margin: 0;
            display: flex;
        }

        .success-msg {
            background: #d4edda;
            border: 1px solid #28a745;
            color: #155724;
            padding: 10px 16px;
            border-radius: 8px;
            margin-bottom: 16px;
            flex-shrink: 0;
        }

        .empty-state {
            padding: 100px;
            text-align: center;
            color: #94a3b8;
        }

        .pagination-container {
            padding: 15px 0;
            flex-shrink: 0;
            display: flex;
            justify-content: center;
        }

        .pagination-container nav,
        .pagination-container nav>div {
            display: flex;
            align-items: center;
            gap: 4px;
        }
    </style>

    <div class="notif-page-wrapper">

        <div class="notif-title">
            <h1>Notifications Commerciale</h1>
            <p style="color: #64748b; font-size: 14px;">
                {{ $notifications->total() }} notifications au total
            </p>
        </div>

        @if (session('success'))
            <div class="success-msg">
                {{ session('success') }}
            </div>
        @endif

        <div class="notif-scroll-area">

            @forelse ($notifications as $notification)

                @php
                    $isUnread = is_null($notification->read_at);

                    $type = $notification->data['type'] ?? null;

                    $isFicheAccueil = $type === 'fiche_accueil_completee';
                    $isFicheIntervention = $type === 'fiche_intervention_emise';
                    $isFiche = $isFicheAccueil || $isFicheIntervention;

                    $demande = \App\Models\Demande::find($notification->data['demande_id'] ?? null);

                    
                    $dejaApprouvee =
                        $demande && in_array($demande->statut, ['approuve', 'en_cours', 'termine']);

    
                    $dejaFacturee = $demande && $demande->facture && $demande->facture->statut === 'facturée';
                @endphp

                <div class="notif-item" id="notif-{{ $notification->id }}">


                    <div class="notif-header" onclick="toggleNotif('{{ $notification->id }}')">

                        <div class="notif-icon-box">
                            @if ($isFiche)
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1Z" />
                                    <path
                                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3ZM4 4.5V13h8V4.5H4Zm1 2h6v1H5v-1Zm0 2h6v1H5v-1Zm0 2h4v1H5v-1Z" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M.102 2.223A3.004 3.004 0 0 0 3.78 5.897l6.341 6.252A3.003 3.003 0 0 0 13 16a3 3 0 1 0-.851-5.878L5.897 3.781A3.004 3.004 0 0 0 2.223.1l2.141 2.142L4 4l-1.757.364L.102 2.223zm13.37 9.019.528.026.287.445.445.287.026.529L15 13l-.242.471-.026.529-.445.287-.287.445-.529.026L13 15l-.471-.242-.529-.026-.287-.445-.445-.287-.026-.529L11 13l.242-.471.026-.529.445-.287.287-.445.529-.026L13 11l.471.242z" />
                                </svg>
                            @endif
                        </div>

                        <div class="notif-header-info">

                            <div class="notif-header-line">

                                <span class="notif-subject">

                                    @if ($isFicheIntervention)
                                        Fiche d'intervention émise
                                    @elseif ($isFicheAccueil)
                                        Fiche d'accueil complétée
                                    @else
                                        Demande de maintenance
                                    @endif

                                    @if ($isUnread)
                                        <span class="badge-unread">
                                            Nouveau
                                        </span>
                                    @endif

                                </span>

                                <span class="notif-time">
                                    {{ $notification->created_at->diffForHumans() }}
                                </span>

                            </div>


                            <div class="notif-preview">

                                @if ($isFiche)
                                    {{ $notification->data['message'] ?? '' }}
                                @else
                                    {{ $notification->data['nom_complet'] ?? 'N/A' }}

                                    @if (!empty($notification->data['objet']))
                                        — {{ $notification->data['objet'] }}
                                    @endif
                                @endif

                            </div>

                        </div>

                        <span class="notif-chevron">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </span>

                    </div>

                    <form method="POST"
                        action="{{ route('commercial.notification_commerciale.destroy', $notification->id) }}"
                        class="btn-delete-notif-form" onsubmit="return confirm('Supprimer cette notification ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete-notif" title="Supprimer la notification">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                <path
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                            </svg>
                        </button>
                    </form>


                    <div class="notif-body" id="body-{{ $notification->id }}">

                        <div class="notif-body-inner">

                            @if ($isFiche)
                                <div class="detail-row">
                                    <span class="detail-label">Message :</span>

                                    <span class="detail-value">
                                        {{ $notification->data['message'] ?? 'N/A' }}
                                    </span>
                                </div>

                                <div class="detail-row">
                                    <span class="detail-label">Date :</span>

                                    <span class="detail-value">
                                        {{ $notification->created_at->format('d/m/Y à H:i') }}
                                    </span>
                                </div>

                                @if ($demande)
                                    <div class="detail-row">
                                        <span class="detail-label">Client :</span>

                                        <span class="detail-value">
                                            {{ $demande->nom_complet ?? 'N/A' }}
                                        </span>
                                    </div>

                                    <div class="detail-row">
                                        <span class="detail-label">Statut :</span>

                                        <span class="detail-value">
                                            {{ ucfirst($demande->statut ?? 'N/A') }}
                                        </span>
                                    </div>
                                @endif


                                @if ($isFicheIntervention && $demande)
                                    <div class="actions">
                                        @if ($dejaFacturee)
                                            <span class="btn btn-disabled">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                </svg>
                                                Facture établie
                                            </span>
                                        @else
                                            <a href="{{ route('commercial.facturation', $demande->id) }}"
                                                class="btn btn-approve">
                                                Établir la facture
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            @else
                                <div class="detail-row">
                                    <span class="detail-label">Client :</span>

                                    <span class="detail-value">
                                        {{ $notification->data['nom_complet'] ?? 'N/A' }}
                                    </span>
                                </div>

                                <div class="detail-row">
                                    <span class="detail-label">Objet :</span>

                                    <span class="detail-value">
                                        {{ $notification->data['objet'] ?? 'N/A' }}
                                    </span>
                                </div>

                                @if ($demande)
                                    <div class="detail-row">
                                        <span class="detail-label">Description :</span>

                                        <span class="detail-value">
                                            {{ $demande->panne ?? 'N/A' }}
                                        </span>
                                    </div>

                                    <div class="detail-row">
                                        <span class="detail-label">Statut :</span>

                                        <span class="detail-value">
                                            {{ ucfirst($demande->statut ?? 'N/A') }}
                                        </span>
                                    </div>
                                @endif

                                <div class="detail-row">
                                    <span class="detail-label">Date :</span>

                                    <span class="detail-value">
                                        {{ $notification->created_at->format('d/m/Y à H:i') }}
                                    </span>
                                </div>


                                <div class="actions">

                                    @if ($dejaApprouvee)
                                        <button class="btn btn-disabled" disabled>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                            </svg>
                                            Approuvée
                                        </button>
                                    @else
                                        <form method="POST"
                                            action="{{ route('commercial.notifications.approuver', $notification->id) }}">

                                            @csrf

                                            <button type="submit" class="btn btn-approve">

                                                Approuver

                                            </button>

                                        </form>
                                    @endif

                                </div>
                            @endif

                        </div>

                    </div>

                </div>

            @empty

                <div class="empty-state">
                    <p>Aucune notification pour le moment.</p>
                </div>

            @endforelse

        </div>

        @if ($notifications->hasPages())
            <div class="pagination-container">
                {{ $notifications->links('vendor.pagination.custom') }}
            </div>
        @endif

    </div>

    <script>
        function toggleNotif(id) {

            const card = document.getElementById('notif-' + id);

            card.classList.toggle('open');
        }
    </script>

</x-app-layout>
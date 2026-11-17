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
            margin-bottom: 16px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: box-shadow 0.2s;
        }

        .notif-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }


        .notif-item.unread {
            border-left: 4px solid #006937;
        }

        .notif-item.read {
            border-left: 4px solid #006937;
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
            flex-wrap: wrap;
        }

        .badge-unread {
            background: #dc3545;
            color: white;
            font-size: 10px;
            padding: 2px 8px;
            border-radius: 10px;
            font-weight: 600;
            display: inline-block;
        }

        .notif-time {
            font-size: 12px;
            color: #94a3b8;
        }

        .notif-preview {
            font-size: 13px;
            color: #64748b;
            margin-top: 3px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 520px;
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
            text-decoration: none;
            border: none;
            cursor: pointer;
            height: 34px;
        }

        .btn-view {
            background: var(--acsi-vert);
            color: #fff;
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
    </style>

    <div class="notif-page-wrapper">

        <div class="notif-title">
            <h1>Notifications Technicien</h1>
            <p style="color: #64748b; font-size: 14px;">{{ $notifications->total() }} notifications au total</p>
        </div>

        @if (session('success'))
            <div class="success-msg">{{ session('success') }}</div>
        @endif

        <div class="notif-scroll-area">

            @forelse ($notifications as $notification)
                @php
                    $isUnread = is_null($notification->read_at);
                @endphp

                <div class="notif-item {{ $isUnread ? 'unread' : 'read' }}" id="notif-{{ $notification->id }}">

                    <div class="notif-header" onclick="toggleNotif('{{ $notification->id }}')">

                        <div class="notif-icon-box">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1Z" />
                                <path
                                    d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3ZM4 4.5V13h8V4.5H4Zm1 2h6v1H5v-1Zm0 2h6v1H5v-1Zm0 2h4v1H5v-1Z" />
                            </svg>
                        </div>

                        <div class="notif-header-info">
                            <div class="notif-header-line">
                                <span class="notif-subject">
                                    Fiche d'accueil à compléter
                                    @if ($isUnread)
                                        <span class="badge-unread">Nouveau</span>
                                    @endif
                                </span>
                                <span class="notif-time">{{ $notification->created_at->diffForHumans() }}</span>
                            </div>

                            <div class="notif-preview">
                                {{ $notification->data['message'] ?? '' }}
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
                        action="{{ route('technicien.notifications_technicien.destroy', $notification->id) }}"
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

                            <div class="detail-row">
                                <span class="detail-label">Message :</span>
                                <span class="detail-value">{{ $notification->data['message'] ?? 'N/A' }}</span>
                            </div>

                            <div class="detail-row">
                                <span class="detail-label">Date :</span>
                                <span
                                    class="detail-value">{{ $notification->created_at->format('d/m/Y à H:i') }}</span>
                            </div>

                            @if (isset($notification->data['demande_id']))
                                <div class="actions">
                                    <a href="{{ route('technicien.fiches_accueil', $notification->data['demande_id']) }}"
                                        class="btn btn-view">
                                        Voir la fiche
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>

                </div>

            @empty
                <div class="empty-state">
                    <p>Aucune notification en attente.</p>
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
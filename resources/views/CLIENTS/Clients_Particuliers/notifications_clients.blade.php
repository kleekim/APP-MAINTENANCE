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
            display: flex;
            align-items: center;
            padding: 20px;
            padding-right: 56px;
            background: white;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            margin-bottom: 16px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .notif-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .notif-item.unread {
            border-left: 4px solid #006937;
            background-color: #fff;
        }

        .notif-icon-box {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 18px;
            flex-shrink: 0;
        }

        .icon-succes {
            background: #d4edda;
            color: #155724;
        }

        .icon-alerte {
            background: #fff8e1;
            color: #856404;
        }

        .icon-info {
            background: #e0f2fe;
            color: #0369a1;
        }

        .icon-facture {
            background: #dbeafe;
            color: #155724;
        }

        .notif-info {
            flex: 1;
        }

        .notif-header-line {
            display: flex;
            justify-content: space-between;
            margin-bottom: 4px;
        }

        .notif-subject {
            font-weight: 700;
            color: #1e293b;
            font-size: 15px;
        }

        .notif-time {
            font-size: 12px;
            color: #94a3b8;
        }

        .notif-message {
            font-size: 14px;
            color: #475569;
            line-height: 1.5;
        }

        .pagination-container {
            padding: 15px 0;
            flex-shrink: 0;
            display: flex;
            justify-content: center;
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
    </style>

    <div class="notif-page-wrapper">

        <div class="notif-title">
            <h1>Mes Notifications</h1>
            <p style="color: #64748b; font-size: 14px;">{{ $notifications->total() }} notifications au total</p>
        </div>

        <div class="notif-scroll-area">
            @forelse ($notifications as $notification)
                @php
                    $type = $notification->data['type'] ?? 'info';
                    $message = $notification->data['message'] ?? '';
                    $isUnread = is_null($notification->read_at);

                    $iconClass = match ($type) {
                        'succes' => 'icon-succes',
                        'alerte' => 'icon-alerte',
                        'facture' => 'icon-facture',
                        default => 'icon-info',
                    };

                    $titre = match ($type) {
                        'succes' => 'Demande approuvée',
                        'alerte' => 'Action requise',
                        'facture' => 'Facture émise',
                        default => 'Information',
                    };
                @endphp

                <div class="notif-item {{ $isUnread ? 'unread' : '' }}">
                    <form method="POST" action="{{ route('client.notification.destroy', $notification->id) }}"
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

                    <div class="notif-icon-box {{ $iconClass }}">
                        @switch($type)
                            @case('succes')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg>
                            @break

                            @case('alerte')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
                                    <path
                                        d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z" />
                                </svg>
                            @break

                            @case('facture')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1Z" />
                                    <path
                                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3ZM4 4.5V13h8V4.5H4Zm1 2h6v1H5v-1Zm0 2h6v1H5v-1Zm0 2h4v1H5v-1Z" />
                                </svg>
                            @break

                            @default
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                </svg>
                        @endswitch
                    </div>

                    <div class="notif-info">
                        <div class="notif-header-line">
                            <span class="notif-subject">{{ $titre }}</span>
                            <span class="notif-time">{{ $notification->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="notif-message">{{ $message }}</div>
                        <div style="font-size: 11px; color: #94a3b8; margin-top: 4px;">
                            {{ $notification->created_at->format('d/m/Y à H:i') }}
                        </div>
                    </div>
                </div>
                @empty
                    <div style="padding: 100px; text-align: center; color: #94a3b8;">
                        <p>Aucune notification pour le moment.</p>
                    </div>
                @endforelse
            </div>

            @if ($notifications->hasPages())
                <div class="pagination-container">
                    {{ $notifications->links() }}
                </div>
            @endif

        </div>
    </x-app-layout>

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .si-wrap {
        padding: 1.5rem;
        font-family: system-ui, sans-serif;
        background: #f5f5f4;
        min-height: 100vh;
    }

    .si-topbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.5rem;
    }

    .si-title {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 18px;
        font-weight: 600;
        color: #1a1a1a;
    }

    .si-badge {
        font-size: 11px;
        font-weight: 600;
        background: #fef3c7;
        color: #92400e;
        padding: 3px 9px;
        border-radius: 20px;
    }

    .si-count {
        font-size: 13px;
        color: #6b7280;
    }

    .si-vider {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        color: #dc2626;
        background: #fff;
        border: 1px solid #fca5a5;
        border-radius: 8px;
        padding: 6px 12px;
        cursor: pointer;
        font-weight: 500;
    }

    .si-vider:hover {
        background: #fef2f2;
    }

    .si-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .si-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow: hidden;
    }

    .si-card-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 16px;
        background: #f9fafb;
        border-bottom: 1px solid #f3f4f6;
    }

    .si-avatar {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: #dbeafe;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #1d4ed8;
        flex-shrink: 0;
    }

    .si-phone {
        font-family: monospace;
        font-size: 13px;
        font-weight: 600;
        color: #111827;
    }

    .si-name {
        font-size: 11px;
        color: #9ca3af;
        margin-top: 1px;
    }

    .si-time {
        display: flex;
        align-items: center;
        gap: 4px;
        font-size: 12px;
        color: #9ca3af;
        white-space: nowrap;
    }

    .si-body {
        padding: 14px 16px;
    }

    .si-msg {
        font-size: 14px;
        line-height: 1.6;
        color: #374151;
        margin-bottom: 12px;
    }

    .si-link {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        font-size: 13px;
        font-weight: 500;
        color: #1d4ed8;
        background: #eff6ff;
        border: 1px solid #bfdbfe;
        border-radius: 8px;
        padding: 6px 12px;
        text-decoration: none;
    }

    .si-link:hover {
        background: #dbeafe;
    }

    .si-foot {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 8px 16px;
        border-top: 1px solid #f3f4f6;
        background: #fafafa;
    }

    .si-provider {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: #6b7280;
    }

    .si-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #22c55e;
        flex-shrink: 0;
    }

    .si-actions {
        display: flex;
        gap: 8px;
    }

    .si-btn {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 12px;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 7px;
        padding: 5px 10px;
        cursor: pointer;
        color: #6b7280;
        font-weight: 500;
    }

    .si-btn:hover {
        background: #f9fafb;
        color: #374151;
    }

    .si-btn-del {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 12px;
        background: #fff;
        border: 1px solid #fca5a5;
        border-radius: 7px;
        padding: 5px 10px;
        cursor: pointer;
        color: #dc2626;
        font-weight: 500;
    }

    .si-btn-del:hover {
        background: #fef2f2;
    }

    .si-empty {
        text-align: center;
        padding: 4rem;
        color: #9ca3af;
    }

    .si-empty-icon {
        display: flex;
        justify-content: center;
        margin-bottom: 12px;
        color: #d1d5db;
    }
</style>

<div class="si-wrap">
    <div class="si-topbar">
        <div class="si-title">
            SMS Inbox <span class="si-badge">DEV</span>
        </div>
        <div style="display:flex;align-items:center;gap:12px;">
            <span class="si-count">{{ $smses->total() }} message(s)</span>
            <form method="POST" action="{{ route('sms-logs.truncate') }}"
                onsubmit="return confirm('Vider toute la boîte SMS ?')">
                @csrf
                <button type="submit" class="si-vider">Vider</button>
            </form>
        </div>
    </div>

    @if ($smses->count() > 0)
        <div class="si-list">
            @foreach ($smses as $sms)
                @php
                    preg_match('/https?:\/\/\S+/', $sms->message, $matches);
                    $lien = $matches[0] ?? null;
                    $texte = $lien ? trim(str_replace($lien, '', $sms->message)) : $sms->message;
                @endphp

                <div class="si-card">
                    <div class="si-card-head">
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div class="si-avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                                    <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                </svg>
                            </div>
                            <div>
                                <div class="si-phone">{{ $sms->to }}</div>
                                <div class="si-name">{{ optional($sms->user)->name ?? '—' }}</div>
                            </div>
                        </div>
                        <div class="si-time">{{ $sms->created_at->format('d/m/Y H:i') }}</div>
                    </div>

                    <div class="si-body">
                        <p class="si-msg">{{ $texte }}</p>
                        @if ($lien)
                            <a href="{{ $lien }}" class="si-link">
                                Définir mon mot de passe
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                    <path fill-rule="evenodd"
                                        d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                                </svg>
                            </a>
                        @endif
                    </div>

                    <div class="si-foot">
                        <div class="si-provider">
                            <span class="si-dot"></span> {{ $sms->provider }}
                        </div>
                        <div class="si-actions">
                            <form method="POST" action="{{ route('sms-logs.destroy', $sms) }}"
                                onsubmit="return confirm('Supprimer ce SMS ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="si-btn-del">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="margin-top:1.5rem;">{{ $smses->links() }}</div>
    @else
        <div class="si-empty">
            <div class="si-empty-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path
                        d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                    <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                </svg>
            </div>
            <p>Aucun SMS pour le moment.</p>
        </div>
    @endif
</div>
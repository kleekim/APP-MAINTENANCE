<flux:sidebar sticky stashable class="h-screen flex flex-col" style="background: transparent; border-right: none;">

    <flux:sidebar.toggle class="lg:hidden" icon="x-mark" style="color: #94a3b8;" />


    <div class="flex justify-center w-full pt-8 pb-6">
        <a href="/" class="inline-block" style="transition: transform .2s;"
            onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
            <div style="transform: scale(1.7); transform-origin: center; line-height:0; display:block;">
                <x-app-logo />
            </div>
        </a>
    </div>

    <br>
    <br>
    <br>

    <div
        style="height: 3px; background: linear-gradient(90deg, #006937 0%, #006937 33%, #f7be00 33%, #f7be00 66%, #ae1410 66%, #ae1410 100%); margin: 0 16px 24px; border-radius: 99px;">
    </div>

    <br>
    <br>


    <nav class="flex flex-col gap-2 px-3">

        @php $isActive = request()->routeIs('dashboard'); @endphp
        <a href="{{ route('dashboard') }}"
            style="display:flex; align-items:center; gap:14px;
            padding:13px 14px; border-radius:12px;
            text-decoration:none; font-size:18px; font-weight:600;
            transition: all .18s;
            {{ $isActive
                ? 'background:rgba(255,255,255,0.18); color:#fff; box-shadow: inset 0 1px 0 rgba(255,255,255,0.15);'
                : 'color:#94a3b8;' }}"
            onmouseover="if(!{{ $isActive ? 'true' : 'false' }}) { this.style.background='rgba(255,255,255,0.10)'; this.style.color='#fff'; this.style.transform='translateX(3px)'; }"
            onmouseout="if(!{{ $isActive ? 'true' : 'false' }}) { this.style.background='transparent'; this.style.color='#94a3b8'; this.style.transform='translateX(0)'; }">
            <span
                style="width:42px;height:42px;border-radius:11px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </span>
            Tableau de bord
        </a>
        <br>



        {{-- ── CLIENT --}}
        @role('client')
            <div style="display:flex;align-items:center;gap:8px;padding:22px 14px 10px;">
                <div
                    style="width:6px;height:6px;border-radius:50%;background:#86efac;box-shadow:0 0 7px #86efac;flex-shrink:0;">
                </div>
                <span
                    style="font-size:12px;font-weight:800;color:#86efac;text-transform:uppercase;letter-spacing:1.5px;">Espace
                    client</span>
            </div>

            <a href="{{ url('formulaire_demande') }}"
                style="display:flex;align-items:center;gap:14px;padding:13px 14px;border-radius:12px;
                text-decoration:none;font-size:18px;font-weight:500;color:#94a3b8;transition:all .18s;margin-bottom:4px;"
                onmouseover="this.style.background='rgba(255,255,255,0.10)';this.style.color='#fff';this.style.transform='translateX(3px)';"
                onmouseout="this.style.background='transparent';this.style.color='#94a3b8';this.style.transform='translateX(0)';">
                <span
                    style="width:42px;height:42px;border-radius:11px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                </span>
                Soumettre une nouvelle demande
            </a>

            <a href="{{ url('/client/demande') }}"
                style="display:flex;align-items:center;gap:14px;padding:13px 14px;border-radius:12px;
                text-decoration:none;font-size:18px;font-weight:500;color:#94a3b8;transition:all .18s;margin-bottom:4px;"
                onmouseover="this.style.background='rgba(255,255,255,0.10)';this.style.color='#fff';this.style.transform='translateX(3px)';"
                onmouseout="this.style.background='transparent';this.style.color='#94a3b8';this.style.transform='translateX(0)';">
                <span
                    style="width:42px;height:42px;border-radius:11px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </span>
                Mes demandes
            </a>

            <a href="{{ url('/client/notification') }}"
                style="display:flex;align-items:center;gap:14px;padding:13px 14px;border-radius:12px;
                text-decoration:none;font-size:18px;font-weight:500;color:#94a3b8;transition:all .18s;margin-bottom:4px;"
                onmouseover="this.style.background='rgba(255,255,255,0.10)';this.style.color='#fff';this.style.transform='translateX(3px)';"
                onmouseout="this.style.background='transparent';this.style.color='#94a3b8';this.style.transform='translateX(0)';">
                <span
                    style="width:42px;height:42px;border-radius:11px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </span>
                Notifications
            </a>


            <a href="{{ url('/client/fiches') }}"
                style="display:flex;align-items:center;gap:14px;padding:13px 14px;border-radius:12px;
                text-decoration:none;font-size:18px;font-weight:500;color:#94a3b8;transition:all .18s;margin-bottom:4px;"
                onmouseover="this.style.background='rgba(255,255,255,0.10)';this.style.color='#fff';this.style.transform='translateX(3px)';"
                onmouseout="this.style.background='transparent';this.style.color='#94a3b8';this.style.transform='translateX(0)';">
                <span
                    style="width:42px;height:42px;border-radius:11px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </span>
                Mes Factures
            </a>
        @endrole

        {{-- ── RECOUVREMENT --}}

        @role('recouvrement')
            <a href="{{ route('recouvrement.clients') }}"
                style="display:flex; align-items:center; gap:14px;
    padding:13px 14px; border-radius:12px;
    text-decoration:none; font-size:18px; font-weight:600;
    transition: all .18s; color:#94a3b8;margin-bottom:4px;"
                onmouseover="this.style.background='rgba(255,255,255,0.10)'; this.style.color='#fff'; this.style.transform='translateX(3px)';"
                onmouseout="this.style.background='transparent'; this.style.color='#94a3b8'; this.style.transform='translateX(0)';">
                <span
                    style="width:42px;height:42px;border-radius:11px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <circle cx="8" cy="7" r="4" />
                        <path d="M2 21v-1a6 6 0 016-6h2" />
                        <line x1="19" y1="11" x2="19" y2="19" />
                        <line x1="15" y1="15" x2="23" y2="15" />
                    </svg>
                </span>
                Clients
            </a>
        @endrole


        {{-- ── COMMERCIAL --}}
        @role('commerciale')
            <div style="display:flex;align-items:center;gap:8px;padding:22px 14px 10px;">
                <div
                    style="width:6px;height:6px;border-radius:50%;background:#f7be00;box-shadow:0 0 7px #f7be00;flex-shrink:0;">
                </div>
                <span
                    style="font-size:12px;font-weight:800;color:#f7be00;text-transform:uppercase;letter-spacing:1.5px;">Gestion</span>
            </div>

            <a href="{{ route('commercial.reception_demande') }}"
                style="display:flex;align-items:center;gap:14px;padding:13px 14px;border-radius:12px;
                text-decoration:none;font-size:18px;font-weight:500;color:#94a3b8;transition:all .18s;margin-bottom:4px;"
                onmouseover="this.style.background='rgba(255,255,255,0.10)';this.style.color='#fff';this.style.transform='translateX(3px)';"
                onmouseout="this.style.background='transparent';this.style.color='#94a3b8';this.style.transform='translateX(0)';">
                <span
                    style="width:42px;height:42px;border-radius:11px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                </span>
                Demandes reçues
            </a>

            <a href="{{ route('commercial.pagefacture') }}"
                style="display:flex;align-items:center;gap:14px;padding:13px 14px;border-radius:12px;
                text-decoration:none;font-size:18px;font-weight:500;color:#94a3b8;transition:all .18s;margin-bottom:4px;"
                onmouseover="this.style.background='rgba(255,255,255,0.10)';this.style.color='#fff';this.style.transform='translateX(3px)';"
                onmouseout="this.style.background='transparent';this.style.color='#94a3b8';this.style.transform='translateX(0)';">
                <span
                    style="width:42px;height:42px;border-radius:11px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 14l2 2 4-4M7 3H5a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2V5a2 2 0 00-2-2h-2M9 3h6M9 3a2 2 0 000 4h6a2 2 0 000-4" />
                    </svg>
                </span>
                Facturation Client
            </a>
        @endrole

        {{-- ── TECHNICIEN --}}
        @role('technicien')
            <div style="display:flex;align-items:center;gap:8px;padding:22px 14px 10px;">
                <div
                    style="width:6px;height:6px;border-radius:50%;background:#4ade80;box-shadow:0 0 7px #4ade80;flex-shrink:0;">
                </div>
                <span
                    style="font-size:12px;font-weight:800;color:#4ade80;text-transform:uppercase;letter-spacing:1.5px;">Interventions</span>
            </div>

            <a href="{{ route('technicien.liste_client') }}"
                style="display:flex;align-items:center;gap:14px;padding:13px 14px;border-radius:12px;
                text-decoration:none;font-size:18px;font-weight:500;color:#94a3b8;transition:all .18s;margin-bottom:4px;"
                onmouseover="this.style.background='rgba(255,255,255,0.10)';this.style.color='#fff';this.style.transform='translateX(3px)';"
                onmouseout="this.style.background='transparent';this.style.color='#94a3b8';this.style.transform='translateX(0)';">
                <span
                    style="width:42px;height:42px;border-radius:11px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <circle cx="8" cy="7" r="4" />
                        <path d="M2 21v-1a6 6 0 016-6h2" />
                        <line x1="19" y1="11" x2="19" y2="19" />
                        <line x1="15" y1="15" x2="23" y2="15" />
                    </svg>
                </span>
                Liste clients
            </a>

            <a href="{{ route('technicien.diagnostic') }}"
                style="display:flex;align-items:center;gap:14px;padding:13px 14px;border-radius:12px;
                text-decoration:none;font-size:18px;font-weight:500;color:#94a3b8;transition:all .18s;margin-bottom:4px;"
                onmouseover="this.style.background='rgba(255,255,255,0.10)';this.style.color='#fff';this.style.transform='translateX(3px)';"
                onmouseout="this.style.background='transparent';this.style.color='#94a3b8';this.style.transform='translateX(0)';">
                <span
                    style="width:42px;height:42px;border-radius:11px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                </span>
                Diagnostic Client
            </a>

            <a href="{{ route('technicien.intervention') }}"
                style="display:flex;align-items:center;gap:14px;padding:13px 14px;border-radius:12px;
                text-decoration:none;font-size:18px;font-weight:500;color:#94a3b8;transition:all .18s;margin-bottom:4px;"
                onmouseover="this.style.background='rgba(255,255,255,0.10)';this.style.color='#fff';this.style.transform='translateX(3px)';"
                onmouseout="this.style.background='transparent';this.style.color='#94a3b8';this.style.transform='translateX(0)';">
                <span
                    style="width:42px;height:42px;border-radius:11px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </span>
                Fiche intervention
            </a>
        @endrole

        {{-- ── ADMINISTRATEUR --}}
        @role('administrateur')
            <div style="display:flex;align-items:center;gap:8px;padding:22px 14px 10px;">
                <div
                    style="width:6px;height:6px;border-radius:50%;background:#f87171;box-shadow:0 0 7px #f87171;flex-shrink:0;">
                </div>
                <span
                    style="font-size:12px;font-weight:800;color:#f87171;text-transform:uppercase;letter-spacing:1.5px;">Administration</span>
            </div>

            <a href="{{ route('admin.users.index') }}"
                style="display:flex;align-items:center;gap:14px;padding:13px 14px;border-radius:12px;
                text-decoration:none;font-size:18px;font-weight:500;color:#94a3b8;transition:all .18s;margin-bottom:4px;"
                onmouseover="this.style.background='rgba(255,255,255,0.10)';this.style.color='#fff';this.style.transform='translateX(3px)';"
                onmouseout="this.style.background='transparent';this.style.color='#94a3b8';this.style.transform='translateX(0)';">
                <span
                    style="width:42px;height:42px;border-radius:11px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </span>
                Utilisateurs
            </a>

            <a href="{{ route('admin.clients.index') }}"
                style="display:flex;align-items:center;gap:14px;padding:13px 14px;border-radius:12px;
                text-decoration:none;font-size:18px;font-weight:500;color:#94a3b8;transition:all .18s;margin-bottom:4px;"
                onmouseover="this.style.background='rgba(255,255,255,0.10)';this.style.color='#fff';this.style.transform='translateX(3px)';"
                onmouseout="this.style.background='transparent';this.style.color='#94a3b8';this.style.transform='translateX(0)';">
                <span
                    style="width:42px;height:42px;border-radius:11px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <circle cx="8" cy="7" r="4" />
                        <path d="M2 21v-1a6 6 0 016-6h2" />
                        <line x1="19" y1="11" x2="19" y2="19" />
                        <line x1="15" y1="15" x2="23" y2="15" />
                    </svg>
                </span>
                Clients
            </a>

            <a href="{{ route('admin.demandes.index') }}"
                style="display:flex;align-items:center;gap:14px;padding:13px 14px;border-radius:12px;
                text-decoration:none;font-size:18px;font-weight:500;color:#94a3b8;transition:all .18s;margin-bottom:4px;"
                onmouseover="this.style.background='rgba(255,255,255,0.10)';this.style.color='#fff';this.style.transform='translateX(3px)';"
                onmouseout="this.style.background='transparent';this.style.color='#94a3b8';this.style.transform='translateX(0)';">
                <span
                    style="width:42px;height:42px;border-radius:11px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </span>
                Demandes
            </a>

            <a href="{{ route('admin.interventions.suivi.interventions') }}"
                style="display:flex;align-items:center;gap:14px;padding:13px 14px;border-radius:12px;
                text-decoration:none;font-size:18px;font-weight:500;color:#94a3b8;transition:all .18s;margin-bottom:4px;"
                onmouseover="this.style.background='rgba(255,255,255,0.10)';this.style.color='#fff';this.style.transform='translateX(3px)';"
                onmouseout="this.style.background='transparent';this.style.color='#94a3b8';this.style.transform='translateX(0)';">
                <span
                    style="width:42px;height:42px;border-radius:11px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </span>
                Suivi interventions
            </a>

            <a href="{{ route('admin.rapport.suivi_rapport') }}"
                style="display:flex;align-items:center;gap:14px;padding:13px 14px;border-radius:12px;
                text-decoration:none;font-size:18px;font-weight:500;color:#94a3b8;transition:all .18s;margin-bottom:4px;"
                onmouseover="this.style.background='rgba(255,255,255,0.10)';this.style.color='#fff';this.style.transform='translateX(3px)';"
                onmouseout="this.style.background='transparent';this.style.color='#94a3b8';this.style.transform='translateX(0)';">
                <span
                    style="width:42px;height:42px;border-radius:11px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </span>
                Rapports
            </a>
        @endrole

    </nav>

    <flux:spacer />

</flux:sidebar>
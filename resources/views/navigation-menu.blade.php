@php
    $roleName = auth()->user()?->roles->first()?->name;
    $dashboardRoute = match ($roleName) {
        'administrateur' => 'admin.dashboard',
        'client' => 'client_Dashboard',
        'Client_Contrat' => 'client_contrat.dashboard',
        'commerciale' => 'commercial.dashboard',
        'technicien' => 'technicien.dashboard',
        'recouvrement' => 'recouvrement.dashboard',
        default => 'dashboard',
    };
@endphp

<div>
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap');

.acsi-appnav {
    position: sticky;
    top: 0;
    z-index: 100;
    background: #ffffff;
    border-bottom: 3px solid #006937;
    box-shadow: 0 2px 12px rgba(0, 105, 55, 0.08);
    font-family: 'Montserrat', 'Segoe UI', sans-serif;
}

.acsi-appnav .inner {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 32px;
    height: 64px;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 16px;
}


.acsi-appnav .nav-brand {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    flex-shrink: 0;
}

.acsi-appnav .nav-brand-name {
    font-size: 15px;
    font-weight: 800;
    color: #006937;
    letter-spacing: 0.5px;
}


.acsi-appnav .nav-right {
    display: flex;
    align-items: center;
    gap: 6px;
}


.acsi-appnav .nav-icon-btn {
    position: relative;
    width: 44px; height: 44px;
    display: flex; align-items: center; justify-content: center;
    border-radius: 12px;
    color: #475569;
    background: transparent;
    text-decoration: none;
    transition: background .18s, color .18s;
    border: none; cursor: pointer;
}

.acsi-appnav .nav-icon-btn:hover {
    background: #f0fdf4;
    color: #006937;
}

.acsi-appnav .nav-icon-btn svg {
    width: 24px; height: 24px;
}

.acsi-appnav .nav-badge {
    position: absolute;
    top: 4px; right: 4px;
    width: 16px; height: 16px;
    background: #ef4444;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 9px; font-weight: 700; color: #fff;
    border: 1.5px solid #fff;
}


.acsi-appnav .nav-sep {
    width: 1px; height: 28px;
    background: #e2e8f0;
    margin: 0 4px;
    flex-shrink: 0;
}


.acsi-appnav .nav-profile-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 6px 10px;
    border-radius: 10px;
    background: transparent;
    border: none; cursor: pointer;
    transition: background .18s;
    font-family: 'Montserrat', sans-serif;
}

.acsi-appnav .nav-profile-btn:hover {
    background: #f0fdf4;
}

.acsi-appnav .nav-avatar-img {
    width: 32px; height: 32px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #006937;
}

.acsi-appnav .nav-avatar-txt {
    width: 32px; height: 32px;
    border-radius: 50%;
    border: 2px solid #006937;
    background: #f0fdf4;
    display: flex; align-items: center; justify-content: center;
    font-size: 12px; font-weight: 700; color: #006937;
    flex-shrink: 0;
}

.acsi-appnav .nav-profile-name {
    font-size: 13px;
    font-weight: 600;
    color: #1e293b;
    max-width: 120px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.acsi-appnav .nav-chevron {
    width: 14px; height: 14px;
    color: #94a3b8;
    flex-shrink: 0;
}


.acsi-appnav::after {
    content: '';
    display: block;
    height: 3px;
    background: linear-gradient(90deg, #006937 0%, #4ade80 50%, #f7be00 100%);
    
}


.acsi-appnav .hamburger-btn {
    display: none;
    width: 38px; height: 38px;
    align-items: center; justify-content: center;
    border-radius: 8px;
    background: none; border: none; cursor: pointer;
    color: #475569;
    transition: background .18s;
}
.acsi-appnav .hamburger-btn:hover { background: #f0fdf4; }


.acsi-mobile-menu {
    display: none;
    background: #fff;
    border-top: 1px solid #e2e8f0;
    padding: 12px 0;
}
.acsi-mobile-menu.open { display: block; }
.acsi-mobile-menu a {
    display: block;
    padding: 10px 24px;
    font-size: 14px; font-weight: 500;
    color: #475569; text-decoration: none;
    font-family: 'Montserrat', sans-serif;
    transition: background .15s, color .15s;
}
.acsi-mobile-menu a:hover { background: #f0fdf4; color: #006937; }
.acsi-mobile-menu .mobile-divider { height: 1px; background: #e2e8f0; margin: 8px 0; }
.acsi-mobile-menu .mobile-user {
    padding: 10px 24px 14px;
    display: flex; align-items: center; gap: 10px;
}
.acsi-mobile-menu .mobile-user-name { font-size: 14px; font-weight: 600; color: #1e293b; }
.acsi-mobile-menu .mobile-user-email { font-size: 12px; color: #64748b; }

@media (max-width: 640px) {
    .acsi-appnav .inner { padding: 0 16px; }
    .acsi-appnav .nav-profile-name { display: none; }
    .acsi-appnav .nav-sep { display: none; }
    .acsi-appnav .hamburger-btn { display: flex; }
    .acsi-appnav .desktop-only { display: none; }
}
</style>

<nav class="acsi-appnav" x-data="{ open: false }">
    <div class="inner">

        
    
        <div class="nav-right">

          
            @if (auth()->user()->hasRole('commerciale'))
                @php
                    $navUnread = \App\Models\Message::where('receiver_id', auth()->id())->whereNull('read_at')->count();
                @endphp
                <a href="{{ route('commercial.message') }}" class="nav-icon-btn desktop-only" title="Messagerie">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    @if ($navUnread > 0)
                        <span class="nav-badge">{{ $navUnread > 99 ? '99+' : $navUnread }}</span>
                    @endif
                </a>
            @endif

            
            @if (auth()->user()->hasRole('client'))
                @php
                    $navUnread = \App\Models\Message::where('receiver_id', auth()->id())->whereNull('read_at')->count();
                @endphp
                <a href="{{ route('client.message') }}" class="nav-icon-btn desktop-only" title="Messagerie">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    @if ($navUnread > 0)
                        <span class="nav-badge">{{ $navUnread > 99 ? '99+' : $navUnread }}</span>
                    @endif
                </a>
            @endif

          
            @php
                $notifRoute = match(true) {
                    auth()->user()->hasRole('administrateur') => 'admin.notification_admin',
                    auth()->user()->hasRole('client')        => 'client.notification',
                    auth()->user()->hasRole('commerciale')   => 'commercial.notification_commerciale',
                    auth()->user()->hasRole('technicien')    => 'technicien.notifications_technicien',
                    auth()->user()->hasRole('recouvrement')  => 'recouvrement.notification_recouvrement',
                    default => null,
                };
                $unreadCount = auth()->user()->unreadNotifications->count();
            @endphp
            @if ($notifRoute)
                <a href="{{ route($notifRoute) }}" class="nav-icon-btn desktop-only" title="Notifications">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    @if ($unreadCount > 0)
                        <span class="nav-badge">{{ $unreadCount > 99 ? '99+' : $unreadCount }}</span>
                    @endif
                </a>
            @endif

            <div class="nav-sep desktop-only"></div>

          
            <div class="relative desktop-only">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="nav-profile-btn">
                                <img class="nav-avatar-img" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"/>
                                <span class="nav-profile-name">{{ Auth::user()->name }}</span>
                                <svg class="nav-chevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                </svg>
                            </button>
                        @else
                            <button class="nav-profile-btn">
                                <div class="nav-avatar-txt">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                                <span class="nav-profile-name">{{ Auth::user()->name }}</span>
                                <svg class="nav-chevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                </svg>
                            </button>
                        @endif
                    </x-slot>
                    <x-slot name="content">
                        <div class="block px-4 py-2 text-xs text-gray-400">{{ __('Gérer le Compte') }}</div>
                        <x-dropdown-link href="{{ route('profile.show') }}">{{ __('Profil') }}</x-dropdown-link>
                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-dropdown-link href="{{ route('api-tokens.index') }}">{{ __('API Tokens') }}</x-dropdown-link>
                        @endif
                        <div class="border-t border-gray-200"></div>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">{{ __('Déconnexion') }}</x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            
            <button class="hamburger-btn" @click="open = !open" aria-label="Menu">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:22px;height:22px;">
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

        </div>
    </div>

 
    <div class="acsi-mobile-menu" :class="{ 'open': open }">
        <div class="mobile-user">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <img class="nav-avatar-img" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"/>
            @else
                <div class="nav-avatar-txt">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
            @endif
            <div>
                <div class="mobile-user-name">{{ Auth::user()->name }}</div>
                <div class="mobile-user-email">{{ Auth::user()->email }}</div>
            </div>
        </div>
        <div class="mobile-divider"></div>
        <a href="{{ route($dashboardRoute) }}">Dashboard</a>
        <a href="{{ route('profile.show') }}">Profil</a>
        @if ($notifRoute ?? false)
            <a href="{{ route($notifRoute) }}">Notifications @if($unreadCount > 0)<span style="background:#ef4444;color:#fff;border-radius:9px;padding:1px 6px;font-size:10px;margin-left:4px;">{{ $unreadCount }}</span>@endif</a>
        @endif
        <div class="mobile-divider"></div>
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf
            <a href="{{ route('logout') }}" @click.prevent="$root.submit();" style="color:#ef4444;">Déconnexion</a>
        </form>
    </div>
</nav>

</div>
<x-app-layout>
    <x-slot name="header"></x-slot>

    <style>
        :root {
            --acsi-vert: #006937;
            --acsi-vert-clair: #edf7ee;
            --acsi-vert-fonce: #0e5136;
            --acsi-jaune: #f7be00;
            --acsi-rouge: #ae1410;
        }

        body { background: #e8f1ec ; }

        .chat-wrapper {
            height: calc(100vh - 180px);
            background: #f5faf2;
            display: flex;
            overflow: hidden;
            border-radius: 18px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.12);
            margin: 20px;
        }

        .chat-sidebar {
            width: 350px;
            border-right: 1px solid #d8e3d6;
            display: flex;
            flex-direction: column;
            background: #f7fbf6;
        }

        .sidebar-search {
            padding: 18px;
            border-bottom: 1px solid #d8e3d6;
            background: #eef6ec;
        }

        .search-input-group {
            background: #f2f8f1;
            border-radius: 14px;
            padding: 10px 14px;
            display: flex;
            align-items: center;
            border: 1px solid #d4ddd3;
        }

        .search-input-group input {
            background: transparent;
            border: none;
            outline: none;
            width: 100%;
            font-size: 0.95rem;
            margin-left: 10px;
        }

        .conv-list { flex: 1; overflow-y: auto; }

        .conv-item {
            padding: 16px 18px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.2s ease;
            border-bottom: 1px solid #e6efe5;
            text-decoration: none;
            color: inherit;
            background: #f8fbf7;
        }

        .conv-item:hover {
            background: #eef7ec;
            transform: translateX(2px);
        }

        .conv-item.active {
            background: #e6f4e9;
            border-left: 4px solid var(--acsi-vert);
        }

        .conv-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            margin-right: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(12, 54, 30, 0.12);
        }

        .chat-main {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: #f7fbf7;
        }

        .chat-header-bar {
            padding: 18px 24px;
            background: #ffffff;
            border-bottom: 1px solid #d8e3d6;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: inset 0 -1px 0 rgba(216, 227, 214, 0.8);
        }

        .msg-container {
            flex: 1;
            overflow-y: auto;
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            background: linear-gradient(180deg, rgba(248, 252, 245, 1) 0%, rgba(240, 248, 238, 1) 100%);
        }

        .msg-bubble {
            max-width: 70%;
            padding: 12px 16px;
            border-radius: 16px;
            font-size: 0.95rem;
            position: relative;
            box-shadow: 0 8px 20px rgba(16, 40, 22, 0.06);
            line-height: 1.5;
        }

        .msg-received {
            align-self: flex-start;
            background: #ffffff;
            border: 1px solid #e1e9e1;
        }

        .msg-sent {
            align-self: flex-end;
            background: var(--acsi-vert);
            color: white;
        }

        .msg-time {
            font-size: 0.75rem;
            margin-top: 6px;
            opacity: 0.72;
            text-align: right;
        }

        .chat-footer {
            padding: 18px 24px;
            background: #ffffff;
            border-top: 1px solid #d8e3d6;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .input-box {
            flex: 1;
            background: #f2f8f1;
            border: 1px solid #d4ddd3;
            border-radius: 28px;
            padding: 10px 18px;
        }

        .input-box input {
            width: 100%;
            background: transparent;
            border: none;
            outline: none;
        }

        .btn-acsi-send {
            background: var(--acsi-vert);
            color: white;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 10px 20px rgba(0, 105, 55, 0.18);
        }

        .btn-acsi-send:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 24px rgba(0, 105, 55, 0.22);
        }

        .btn-acsi-send svg {
            width: 18px;
            height: 18px;
            color: white;
            transition: transform 0.2s ease;
        }

        .btn-acsi-send:hover svg { transform: scale(1.1); }

        .msg-menu {
            position: absolute;
            top: -8px;
            display: none;
            z-index: 10;
        }

        .msg-bubble:hover .msg-menu { display: block; }

      
        .msg-sent .msg-menu {
            right: -8px;
            left: auto;
        }

        
        .msg-received .msg-menu {
            left: -8px;
            right: auto;
        }

        .msg-menu-btn {
            background: rgba(0,0,0,0.2);
            border: none;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            cursor: pointer;
            color: white;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .msg-received .msg-menu-btn {
            background: rgba(0,0,0,0.1);
            color: #555;
        }

        .msg-dropdown {
            position: absolute;
            top: 24px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
            min-width: 160px;
            display: none;
            z-index: 20;
            overflow: hidden;
        }

        .msg-dropdown.open { display: block; }

    
        .msg-sent .msg-dropdown {
            right: 0;
            left: auto;
        }

        .msg-received .msg-dropdown {
            left: 0;
            right: auto;
        }

        .msg-dropdown button {
            width: 100%;
            padding: 10px 14px;
            text-align: left;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 13px;
            color: #ae1410;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .msg-dropdown button:hover { background: #fff5f5; }
    </style>

    <div class="chat-wrapper">
        <div class="chat-sidebar">
            <div class="sidebar-search">
                <div class="search-input-group">
                    <i class="fas fa-search text-gray-400"></i>
                    <input type="text" placeholder="Rechercher un client..."
                           onkeyup="filterClients(this.value)">
                </div>
            </div>

            <div class="conv-list">
                @forelse($clients as $client)
                    @php
                        $colors = ['#f7be00', '#ae1410', '#006937'];
                        $color  = $colors[$client->id % 3];
                        $names  = explode(' ', $client->name);
                        $clientInitials = strtoupper(
                            substr($names[0], 0, 1) . (isset($names[1]) ? substr($names[1], 0, 1) : '')
                        );
                    @endphp

                    <a href="{{ route('commercial.message', ['client' => $client->id]) }}"
                       class="conv-item client-item {{ isset($activeClient) && $activeClient->id == $client->id ? 'active' : '' }}"
                       data-name="{{ strtolower($client->name) }}">

                        <div class="conv-avatar" style="background: {{ $color }}">
                            {{ $clientInitials }}
                        </div>

                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-center">
                                <h4 class="font-bold text-gray-800 truncate">{{ $client->name }}</h4>
                                <span class="text-[10px] text-gray-400">
                                    {{ $client->last_message_time ?? '' }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="text-xs text-gray-500 truncate">
                                    {{ $client->last_message ?? 'Démarrer une conversation' }}
                                </p>
                                @if($client->unread_count > 0)
                                    <span class="ml-2 flex-shrink-0 inline-flex items-center justify-center
                                                 w-5 h-5 text-[11px] font-bold text-white rounded-full"
                                          style="background: #006937;">
                                        {{ $client->unread_count > 99 ? '99+' : $client->unread_count }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </a>

                @empty
                    <div class="p-10 text-center text-gray-400">
                        <p class="text-sm">Aucun client trouvé</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="chat-main">
            @if(isset($activeClient))
                <div class="chat-header-bar">
                    <div class="flex items-center gap-3">
                        @php
                            $colors   = ['#f7be00', '#ae1410', '#006937'];
                            $color    = $colors[$activeClient->id % 3];
                            $names    = explode(' ', $activeClient->name);
                            $initials = strtoupper(
                                substr($names[0], 0, 1) . (isset($names[1]) ? substr($names[1], 0, 1) : '')
                            );
                        @endphp
                        <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold"
                             style="background: {{ $color }}; color: white;">
                            {{ $initials }}
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800">{{ $activeClient->name }}</h3>
                            <span class="text-[10px] font-bold lowercase tracking-tighter {{ $activeClient->is_online ? 'text-green-600' : 'text-gray-400' }}">
                                {{ $activeClient->is_online ? 'en ligne' : 'hors ligne' }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="msg-container" id="msg-scroll">
                    @php $lastDate = null; @endphp

                    @foreach($messages as $message)
                        @if(!$message->isVisibleFor(auth()->id()))
                            @continue
                        @endif

                        @php $messageDate = $message->created_at->format('Y-m-d'); @endphp

                        @if($messageDate !== $lastDate)
                            <div class="flex items-center gap-3 my-2">
                                <div class="flex-1 h-px bg-gray-200"></div>
                                <span class="text-[11px] text-gray-400 font-medium px-2 py-1 bg-gray-100 rounded-full">
                                    @if($message->created_at->isToday()) Aujourd'hui
                                    @elseif($message->created_at->isYesterday()) Hier
                                    @else {{ $message->created_at->translatedFormat('d F Y') }}
                                    @endif
                                </span>
                                <div class="flex-1 h-px bg-gray-200"></div>
                            </div>
                            @php $lastDate = $messageDate; @endphp
                        @endif

                        <div class="msg-bubble {{ $message->sender_id == auth()->id() ? 'msg-sent' : 'msg-received' }}"
                             data-id="{{ $message->id }}">

                            <div class="msg-menu">
                                <button class="msg-menu-btn" onclick="toggleMenu(this)">▾</button>
                                <div class="msg-dropdown"> 
                                    <button onclick="deleteMsg({{ $message->id }}, this)">
                                        Supprimer pour moi
                                    </button>
                                </div>
                            </div>

                            <p>{{ $message->contenu }}</p>
                            <div class="msg-time">{{ $message->created_at->format('H:i') }}</div>
                        </div>
                    @endforeach
                </div>

                <form id="send-form" class="chat-footer">
                    @csrf
                    <input type="hidden" name="client_id" value="{{ $activeClient->id }}">
                    <div class="input-box">
                        <input type="text" name="message"
                               placeholder="Ecrire un message..." required>
                    </div>
                    <button type="submit" class="btn-acsi-send">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="M22 2L11 13"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="M22 2L15 22L11 13L2 9L22 2Z"/>
                        </svg>
                    </button>
                </form>

            @else
                <div class="flex-1 flex flex-col items-center justify-center text-gray-400">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-comments text-3xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-600">Messagerie CLIENT</h3>
                    <p class="text-sm">Sélectionnez un client pour discuter</p>
                </div>
            @endif
        </div>
    </div>

    <script>
        const clientId  = {{ isset($activeClient) ? $activeClient->id : 'null' }};
        const container = document.getElementById('msg-scroll');
        const csrf      = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        
        function filterClients(value) {
            document.querySelectorAll('.client-item').forEach(item => {
                item.style.display = item.dataset.name.includes(value.toLowerCase()) ? 'flex' : 'none';
            });
        }

        
        function toggleMenu(btn) {
            const dropdown = btn.nextElementSibling;
            document.querySelectorAll('.msg-dropdown.open').forEach(d => {
                if (d !== dropdown) d.classList.remove('open');
            });
            dropdown.classList.toggle('open');
        }

        document.addEventListener('click', (e) => {
            if (!e.target.closest('.msg-menu')) {
                document.querySelectorAll('.msg-dropdown.open')
                        .forEach(d => d.classList.remove('open'));
            }
        });

       
        async function deleteMsg(id, btn) {
            await fetch(`/commercial/message/delete-for-me/${id}`, {
                method : 'DELETE',
                headers: { 'X-CSRF-TOKEN': csrf }
            });
            const bubble = btn.closest('.msg-bubble');
            bubble.style.transition = 'opacity 0.3s';
            bubble.style.opacity    = '0';
            setTimeout(() => bubble.remove(), 300);
        }

        @if(isset($activeClient))
       
        const pollUrl = "{{ route('commercial.message.poll') }}";
        const sendUrl = "{{ route('commercial.message.send') }}";
        let lastId    = {{ $messages->count() ? $messages->last()->id : 0 }};

        function renderMessage(msg) {
            const div      = document.createElement('div');
            div.className  = 'msg-bubble ' + (msg.sent_by_me ? 'msg-sent' : 'msg-received');
            div.dataset.id = msg.id;
            div.innerHTML  = `
                <div class="msg-menu">
                    <button class="msg-menu-btn" onclick="toggleMenu(this)">▾</button>
                    <div class="msg-dropdown">
                        <button onclick="deleteMsg(${msg.id}, this)">🗑 Supprimer pour moi</button>
                    </div>
                </div>
                <p>${msg.contenu}</p>
                <div class="msg-time">${msg.time}</div>`;
            container.appendChild(div);
            container.scrollTop = container.scrollHeight;
        }

        async function pollMessages() {
            try {
                const res  = await fetch(`${pollUrl}?client_id=${clientId}`);
                const data = await res.json();
                data.messages.forEach(msg => {
                    if (msg.id > lastId) { renderMessage(msg); lastId = msg.id; }
                });
            } catch(e) {}
        }

        
        const form = document.getElementById('send-form');
        if (form) {
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const input = form.querySelector('input[name="message"]');
                const btn   = form.querySelector('.btn-acsi-send');
                if (!input.value.trim()) return;

                btn.disabled      = true;
                btn.style.opacity = '0.5';

                try {
                    await fetch(sendUrl, {
                        method : 'POST',
                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
                        body   : JSON.stringify({ message: input.value.trim(), client_id: clientId })
                    });
                    input.value = '';
                    await pollMessages();
                } finally {
                    btn.disabled      = false;
                    btn.style.opacity = '1';
                }
            });
        }

        container.scrollTop = container.scrollHeight;
        setInterval(pollMessages, 3000);
        @endif
    </script>

</x-app-layout>
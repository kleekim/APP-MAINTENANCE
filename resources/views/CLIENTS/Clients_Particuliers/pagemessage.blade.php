<x-app-layout>
    <x-slot name="header"></x-slot>

    <style>
        :root {
            --acsi-vert: #006937;
            --acsi-jaune: #f7be00;
            --acsi-rouge: #ae1410;
        }

        body { background: #f8fafc ; }

        .chat-page {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 20px 15px;
            background: transparent;
            min-height: calc(100vh - 80px);
        }

        .chat-wrapper {
            width: 100%;
            max-width: 900px;
            height: 80vh;
            background: white;
            display: flex;
            flex-direction: column;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.06);
            border: 1px solid #edf2f7;
        }

        .chat-header-bar {
            padding: 14px 18px;
            background: white;
            border-bottom: 1px solid #edf2f7;
            display: flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: var(--acsi-vert);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .status { font-size: 11px; color: #16a34a; }

        .msg-container {
            flex: 1;
            overflow-y: auto;
            padding: 18px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            background: #f9fafb;
        }

        .msg-bubble {
            max-width: 75%;
            padding: 10px 14px;
            border-radius: 12px;
            font-size: 14px;
            word-wrap: break-word;
            position: relative;
        }

        .msg-client {
            align-self: flex-end;
            background: var(--acsi-vert);
            color: white;
        }

        .msg-admin {
            align-self: flex-start;
            background: white;
            border: 1px solid #e5e7eb;
        }

        .msg-time {
            font-size: 10px;
            margin-top: 4px;
            opacity: 0.6;
            text-align: right;
        }

        .chat-footer {
            padding: 15px;
            border-top: 1px solid #edf2f7;
            display: flex;
            gap: 10px;
            align-items: center;
            background: white;
            flex-shrink: 0;
        }

        .chat-footer input {
            flex: 1;
            padding: 12px 16px;
            border-radius: 25px;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            outline: none;
            transition: border-color 0.2s;
        }

        .chat-footer input:focus {
            border-color: var(--acsi-vert);
            background: white;
        }

        .send-btn {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: var(--acsi-vert);
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform 0.1s;
        }

        .send-btn:active { transform: scale(0.95); }
        .send-btn svg { width: 18px; height: 18px; stroke: white; }

        .msg-menu {
            position: absolute;
            top: -8px;
            display: none;
            z-index: 10;
        }

        .msg-bubble:hover .msg-menu { display: block; }

       
        .msg-client .msg-menu {
            right: -8px;
            left: auto;
        }

       
        .msg-admin .msg-menu {
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
            line-height: 1;
        }

        .msg-admin .msg-menu-btn {
            background: rgba(0,0,0,0.1);
            color: #555;
        }

        .msg-dropdown {
            position: absolute;
            top: 24px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
            min-width: 165px;
            display: none;
            z-index: 20;
            overflow: hidden;
        }

        .msg-dropdown.open { display: block; }

      
        .msg-client .msg-dropdown {
            right: 0;
            left: auto;
        }

        .msg-admin .msg-dropdown {
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

        @media(max-width: 768px) {
            .chat-page { padding: 10px 5px; }
            .chat-wrapper { height: 85vh; }
        }
    </style>

    <div class="chat-page">
        <div class="chat-wrapper">

            <div class="chat-header-bar">
                <div class="avatar">AC</div>
                <div>
                    <div style="font-weight:700;">Commercial ACSI</div>
                    <div class="status {{ $commercialOnline ? 'text-green-600' : 'text-gray-400' }}">
                        {{ $commercialOnline ? 'En ligne' : 'Hors ligne' }}
                    </div>
                </div>
            </div>

           
            <div class="msg-container" id="msg-scroll">

                @php $lastDate = null; @endphp

                @forelse($messages ?? [] as $message)

                    @if(!$message->isVisibleFor(auth()->id()))
                        @continue
                    @endif

                    @php $messageDate = $message->created_at->format('Y-m-d'); @endphp

                    @if($messageDate !== $lastDate)
                        <div class="flex items-center gap-3 my-4">
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

                    <div class="msg-bubble {{ $message->sender_id == auth()->id() ? 'msg-client' : 'msg-admin' }}"
                         data-id="{{ $message->id }}">

                        <div class="msg-menu">
                            <button class="msg-menu-btn" onclick="toggleMenu(this)">▾</button>
                            <div class="msg-dropdown">
                                <button onclick="deleteMsg({{ $message->id }}, this)">
                                    Supprimer pour moi
                                </button>
                            </div>
                        </div>

                        {{ $message->contenu }}
                        <div class="msg-time">{{ $message->created_at->format('H:i') }}</div>
                    </div>

                @empty
                    <div class="flex flex-col items-center justify-center h-full text-gray-400 opacity-60">
                        <p class="text-sm italic">Aucun message. Écrivez à un agent de l'ACSI.</p>
                    </div>
                @endforelse

            </div>

            <form id="send-form" class="chat-footer">
                @csrf
                <input type="text" name="message" placeholder="Écrire un message..."
                       required autocomplete="off">
                <button class="send-btn" type="submit">
                    <svg fill="none" stroke-width="2.5" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
                    </svg>
                </button>
            </form>

        </div>
    </div>

    <script>
        const container = document.getElementById('msg-scroll');
        const csrf      = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const pollUrl   = "{{ route('client.message.poll') }}";
        const sendUrl   = "{{ route('client.message.send') }}";
        const deleteUrl = (id) => `/client/message/delete-for-me/${id}`;
        let lastId      = {{ ($messages ?? collect())->filter(fn($m) => $m->isVisibleFor(auth()->id()))->last()?->id ?? 0 }};

        container.scrollTop = container.scrollHeight;

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
            await fetch(deleteUrl(id), {
                method : 'DELETE',
                headers: { 'X-CSRF-TOKEN': csrf }
            });
            const bubble = btn.closest('.msg-bubble');
            bubble.style.transition = 'opacity 0.3s';
            bubble.style.opacity    = '0';
            setTimeout(() => bubble.remove(), 300);
        }

        function renderMessage(msg) {
            const div      = document.createElement('div');
            div.className  = 'msg-bubble ' + (msg.sent_by_me ? 'msg-client' : 'msg-admin');
            div.dataset.id = msg.id;
            div.innerHTML  = `
                <div class="msg-menu">
                    <button class="msg-menu-btn" onclick="toggleMenu(this)">▾</button>
                    <div class="msg-dropdown">
                        <button onclick="deleteMsg(${msg.id}, this)">🗑 Supprimer pour moi</button>
                    </div>
                </div>
                ${msg.contenu}
                <div class="msg-time">${msg.time}</div>`;
            container.appendChild(div);
            container.scrollTop = container.scrollHeight;
        }

        async function poll() {
            try {
                const res  = await fetch(pollUrl);
                const msgs = await res.json();
                msgs.forEach(msg => {
                    if (msg.id > lastId) { renderMessage(msg); lastId = msg.id; }
                });
            } catch(e) {}
        }

        document.getElementById('send-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            const input = e.target.querySelector('input[name="message"]');
            const btn   = e.target.querySelector('.send-btn');
            if (!input.value.trim()) return;

            btn.disabled = true;
            btn.style.opacity = '0.5';

            try {
                await fetch(sendUrl, {
                    method : 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
                    body   : JSON.stringify({ message: input.value.trim() })
                });
                input.value = '';
                await poll();
            } finally {
                btn.disabled = false;
                btn.style.opacity = '1';
            }
        });

        setInterval(poll, 3000);
    </script>

</x-app-layout>
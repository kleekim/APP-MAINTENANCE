<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow p-6">


            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Liste des Utilisateurs</h2>
                <a href="{{ route('admin.users.create') }}"
                    style="background-color: #006937; color: #ffffff; font-weight: 700; padding: 10px 20px; border-radius: 8px; text-decoration: none;"
                    onmouseout="this.style.backgroundColor='#006937';">
                    Ajouter Utilisateur
                </a>
            </div>
 
            @if ($message = Session::get('success'))
                <div id="successAlert"
                    style="display:flex; align-items:center; justify-content:space-between; gap:12px;
            background-color:#dcfce7; border:1px solid #16a34a; color:#15803d;
            border-radius:8px; padding:14px 18px; margin-bottom:20px; font-weight:500;">
                    <div style="display:flex; align-items:center; gap:10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width:20px;height:20px;flex-shrink:0;"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>{{ $message }}</span>
                    </div>
                    <button onclick="document.getElementById('successAlert').style.display='none'"
                        style="background:none; border:none; cursor:pointer; color:#15803d; font-size:18px; line-height:1; padding:0;">
                        &times;
                    </button>
                </div>
            @endif

            <script>
                const alert = document.getElementById('successAlert');
                if (alert) {
                    setTimeout(() => {
                        alert.style.transition = 'opacity 0.5s ease';
                        alert.style.opacity = '0';
                        setTimeout(() => alert.style.display = 'none', 500);
                    }, 10000);
                }
            </script>

            <div class="mb-4 flex items-center gap-3">
                <input type="text" id="userSearch" placeholder="Rechercher un utilisateur..."
                    onkeyup="filterTable(this.value)"
                    class="w-full sm:w-80 border border-gray-300 rounded-md px-4 py-2 text-sm"
                    onfocus="this.style.outline='none'; this.style.boxShadow='0 0 0 2px #006937'; this.style.borderColor='#006937';"
                    onblur="this.style.boxShadow=''; this.style.borderColor='#d1d5db';">

                <button onclick="filterTable(document.getElementById('userSearch').value)"
                    class="bg-green-700 hover:bg-green-800 text-black px-4 py-2 rounded-md text-sm font-medium">
                    Rechercher
                </button>

            </div>

            <div class="overflow-x-auto" style="max-height: 65vh; overflow-y: auto;">
                <table class="w-full">
                    <thead>
                        <tr style="background-color: #006937;">
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Nom</td>
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Email</td>
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Téléphone</td>
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Rôle</td>
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Actions</td>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody">
                        @forelse($users as $user)
                            @php
                                $role = $user->roles->first()?->name ?? null;
                                $roleStyle = match ($role) {
                                    'administrateur' => 'background:#d1fae5; color:#065f46;',
                                    'technicien' => 'background:#fef3c7; color:#92400e;',
                                    'commerciale' => 'background:#ede9fe; color:#5b21b6;',
                                    'recouvrement' => 'background:#fee2e2; color:#991b1b;',
                                    'Client_Contrat' => 'background:#dbeafe; color:#1e40af;',
                                    'client' => 'background:#dcfce7; color:#166534;',
                                    default => 'background:#f3f4f6; color:#374151;',
                                };
                            @endphp
                            <tr class="border-b hover:bg-gray-50 user-row">
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $user->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $user->phone }}</td>
                                <td class="px-6 py-4 text-sm">
                                    @if ($user->roles->count() > 0)
                                        <span>
                                            {{ $user->roles->first()->name }}
                                        </span>
                                    @else
                                        <span>Pas de rôle</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm space-x-3">
                                    <a href="{{ route('admin.users.edit', $user) }}"
                                        style="background-color:#006937; display:inline-flex; align-items:center; padding:6px 12px; color:#ffffff; font-size:14px; font-weight:600; border-radius:8px; text-decoration:none;"
                                        onmouseover="this.style.backgroundColor='#005a2e'"
                                        onmouseout="this.style.backgroundColor='#006937'">Modifier</a>
                                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 font-semibold"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">Aucun utilisateur trouvé
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($users instanceof \Illuminate\Pagination\Paginator)
                <div class="mt-6">
                    {{ $users->links() }}
                </div>
            @endif

        </div>
    </div>

    <script>
        function filterTable(query) {
            const rows = document.querySelectorAll('#usersTableBody .user-row');
            const q = query.toLowerCase().trim();
            rows.forEach(row => {
                row.style.display = (!q || row.innerText.toLowerCase().includes(q)) ? '' : 'none';
            });
        }
    </script>

</x-app-layout>

<x-app-layout>
    <x-slot name="header"></x-slot>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">
                    Compléter la fiche d'accueil de vos clients
                </h2>
            </div>

            
            <div class="mb-4 flex items-center gap-3">

                <input type="text" id="userSearch" placeholder="Rechercher un client..."
                    onkeyup="filterTable(this.value)"
                    class="w-full sm:w-80 border border-gray-300 rounded-md px-4 py-2 text-sm"
                    onfocus="this.style.outline='none'; this.style.boxShadow='0 0 0 2px #006937'; this.style.borderColor='#006937';"
                    onblur="this.style.boxShadow=''; this.style.borderColor='#d1d5db';">

                <button onclick="filterTable(document.getElementById('userSearch').value)"
                    class="bg-green-700 hover:bg-green-800 text-black px-4 py-2 rounded-md text-sm font-medium">
                    Rechercher
                </button>

            </div>

            <div class=" rounded-lg border border-gray-200" style="max-height: 65vh; overflow-y: auto;">
                <table class="w-full">
                    <thead>
                        <tr style="background-color: #006937;">
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Client</td>
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Objet de la panne</td>
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Statut fiche</td>
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Actions</td>
                        </tr>
                    </thead>
                    <tbody id="ficheTableBody">
                        @forelse($demandes as $index => $demande)
                            @php
                                $statusClasses = [
                                    'brouillon' => 'bg-blue-100 text-blue-800',
                                    'completee' => 'bg-green-100 text-green-800',
                                    'default' => 'bg-gray-100 text-gray-800',
                                ];

                                if ($demande->ficheAccueil) {
                                    $statut = $demande->ficheAccueil->statut;
                                    $statusLabel = $statut === 'completee' ? 'Fiche complétée' : 'Fiche créée';
                                    $currentClass = $statusClasses[$statut] ?? $statusClasses['default'];
                                } else {
                                    $statusLabel = 'Fiche non créée';
                                    $currentClass = $statusClasses['default'];
                                }
                            @endphp
                            <tr class="border-t border-gray-200 hover:bg-green-50 transition-colors fiche-row">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $demande->nom_complet }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $demande->objet ?? ($demande->description ?? 'Non précisé') }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $currentClass }}">
                                        {{ $statusLabel }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="flex items-center gap-2">
                                        @if ($demande->ficheAccueil)
                                            <a href="{{ route('technicien.fiches_accueil', ['id' => $demande->id]) }}"
                                                style="background-color:#006937; display:inline-flex; align-items:center; padding:6px 12px; color:#ffffff; font-size:14px; font-weight:600; border-radius:8px; text-decoration:none;"
                                                onmouseover="this.style.backgroundColor='#005a2e'"
                                                onmouseout="this.style.backgroundColor='#006937'">
                                                {{ $demande->ficheAccueil->informations_technicien ? 'Voir la fiche' : 'Compléter la fiche' }}
                                            </a>
                                        @else
                                            <span
                                                class="px-3 py-1.5 text-xs text-gray-400 bg-gray-50 rounded-lg border border-gray-200 italic">
                                                Pas de fiche
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-sm text-gray-400 text-center">
                                    Aucune demande pour le moment.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function filterTable(query) {
            const rows = document.querySelectorAll('#ficheTableBody .fiche-row');
            const q = query.toLowerCase().trim();
            rows.forEach(row => {
                row.style.display = (!q || row.innerText.toLowerCase().includes(q)) ? '' : 'none';
            });
        }
    </script>

</x-app-layout>

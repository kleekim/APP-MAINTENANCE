<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow p-6">


            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Liste des Demandes</h2>
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


            <div class="mb-4 flex items-center gap-3">

                <input type="text" id="userSearch" placeholder="Rechercher une demande..."
                    onkeyup="filterTable(this.value)"
                    class="w-full sm:w-80 border border-gray-300 rounded-md px-4 py-2 text-sm"
                    onfocus="this.style.outline='none'; this.style.boxShadow='0 0 0 2px #006937'; this.style.borderColor='#006937';"
                    onblur="this.style.boxShadow=''; this.style.borderColor='#d1d5db';">

                <button onclick="filterTable(document.getElementById('userSearch').value)"
                    class="bg-green-700 hover:bg-green-800 text-black px-4 py-2 rounded-md text-sm font-medium">
                    Rechercher
                </button>

            </div>


            <div class="rounded-lg border border-gray-200" style="max-height: 65vh; overflow-y: auto;">
                <table class="w-full">
                    <thead style="position: sticky; top: 0; z-index: 10;">
                        <tr style="background-color: #006937;">
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Nom Client</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Objet</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Panne</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Date</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Statut</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Action</th>
                        </tr>
                    </thead>
                    <tbody id="demandesTableBody">
                        @forelse($demandes as $demande)
                            <tr class="border-t border-gray-200 hover:bg-green-50 transition-colors demande-row">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $demande->nom_complet }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $demande->objet }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $demande->panne }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                    {{ $demande->created_at->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">
                                    <span
                                        style="{{ $demande->statut_couleur }} display:inline-block; padding:4px 12px; border-radius:9999px; font-size:12px; font-weight:600; white-space:nowrap; line-height:1.25;">
                                        {{ $demande->statut_label }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap">
                                    <a href="{{ route('commercial.fiches_accueil', ['id' => $demande->id]) }}"
                                        style="background-color:#006937; display:inline-flex; align-items:center; padding:6px 12px; color:#ffffff; font-size:14px; font-weight:600; border-radius:8px; text-decoration:none;"
                                        onmouseover="this.style.backgroundColor='#005a2e'"
                                        onmouseout="this.style.backgroundColor='#006937'">
                                        {{ $demande->ficheaccueil ? 'Voir la fiche' : 'Établir la fiche d\'accueil' }}
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-400 text-sm">Aucune demande
                                    trouvée.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script>
        function filterTable(query) {
            const rows = document.querySelectorAll('#demandesTableBody .demande-row');
            const q = query.toLowerCase().trim();
            rows.forEach(row => {
                row.style.display = (!q || row.innerText.toLowerCase().includes(q)) ? '' : 'none';
            });
        }

        const alert = document.getElementById('successAlert');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.style.display = 'none', 500);
            }, 4000);
        }
    </script>
</x-app-layout>

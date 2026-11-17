<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Factures par client</h2>
            </div>

            <div class="mb-4 flex items-center gap-3">
                <input type="text" id="clientSearch" placeholder="Rechercher un client..."
                    onkeyup="filterClientTable(this.value)"
                    class="w-full sm:w-80 border border-gray-300 rounded-md px-4 py-2 text-sm"
                    onfocus="this.style.outline='none'; this.style.boxShadow='0 0 0 2px #006937'; this.style.borderColor='#006937';"
                    onblur="this.style.boxShadow=''; this.style.borderColor='#d1d5db';">

                <button onclick="filterClientTable(document.getElementById('clientSearch').value)"
                    class="bg-green-700 hover:bg-green-800 text-black px-4 py-2 rounded-md text-sm font-medium">
                    Rechercher
                </button>
            </div>

            <div class="rounded-lg border border-gray-200" style="max-height: 65vh; overflow-y: auto;">
                <table class="w-full">
                    <thead>
                        <tr style="background-color: #006937;">
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Nom Client</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Nombre de factures</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Montant total facturé</th>
                        </tr>
                    </thead>
                    <tbody id="clientsTableBody">
                        @forelse ($facturesParClient as $ligne)
                            <tr class="border-t border-gray-200 hover:bg-green-50 transition-colors client-row">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $ligne->client }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $ligne->total_factures }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm font-semibold text-gray-900 whitespace-nowrap">
                                    {{ number_format($ligne->montant_total ?? 0, 0, ',', ' ') }} FCFA
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-8 text-sm text-gray-400 text-center">Aucun client
                                    trouvé.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function filterClientTable(value) {
            const filter = value.toLowerCase();
            const rows = document.querySelectorAll('#clientsTableBody .client-row');

            rows.forEach(row => {
                const clientName = row.querySelector('td').textContent.toLowerCase();
                row.style.display = clientName.includes(filter) ? '' : 'none';
            });
        }
    </script>
</x-app-layout>
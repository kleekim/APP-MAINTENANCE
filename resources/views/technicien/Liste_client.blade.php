<x-app-layout>
    <x-slot name="header"></x-slot>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Liste des Clients</h2>
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
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Nom</td>
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Téléphone</td>
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Email</td>
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Adresse</td>
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Type Client</td>
                        </tr>
                    </thead>
                    <tbody id="clientsTableBody">
                        @forelse($clients as $index => $client)
                            <tr class="border-t border-gray-200 hover:bg-green-50 transition-colors client-row">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $client->nom_complet }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $client->telephone }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $client->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $client->adresse }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $client->type_clients }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-sm text-gray-400 text-center">
                                    Aucun client trouvé.
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
            const rows = document.querySelectorAll('#clientsTableBody .client-row');
            const q = query.toLowerCase().trim();
            rows.forEach(row => {
                row.style.display = (!q || row.innerText.toLowerCase().includes(q)) ? '' : 'none';
            });
        }
    </script>

</x-app-layout>

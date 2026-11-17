<x-app-layout>
    <x-slot name="header"></x-slot>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-900">Liste Clients Contractuels</h2>
            </div>

            <div class="overflow-x-auto rounded-lg border border-gray-200">
                <table class="w-full">
                    <thead>
                        <tr style="background-color: #006937;">
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">N°</td>
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Client</td>
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Téléphone</td>
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Email</td>
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Adresse</td>
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Type de contrat</td>
                            <td class="px-6 py-3 text-left text-sm font-semibold text-white">Actions</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($clients as $index => $client)
                            <tr class="border-t border-gray-200 hover:bg-green-50 transition-colors">

                                <td class="px-6 py-4 text-sm text-gray-900">{{ $index + 1 }}</td>

                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $client->client }}</td>

                                <td class="px-6 py-4 text-sm text-gray-600">{{ $client->telephone }}</td>

                                <td class="px-6 py-4 text-sm text-gray-600">{{ $client->email }}</td>

                                <td class="px-6 py-4 text-sm text-gray-600">{{ $client->adresse }}</td>

                                <td class="px-6 py-4 text-sm text-gray-600">

                                    @php
                                        $types = explode(',', $client->type_contrats);
                                    @endphp

                                    @if (in_array('maintenance_preventive', $types))
                                        <span
                                            class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">
                                            Maintenance Préventive
                                        </span>
                                        <div class="text-xs text-gray-400 mt-1">
                                            {{ $client->interventions_par_mois }} intervention / mois
                                        </div>
                                    @endif

                                    @if (in_array('maintenance_curative', $types))
                                        <span
                                            class="inline-block bg-orange-100 text-orange-800 text-xs font-semibold px-2 py-1 rounded-full">
                                            Maintenance Curative
                                        </span>
                                    @endif

                                </td>


                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <div class="flex flex-wrap gap-2">


                                        <a href="{{ route('technicien.planning_intervention', $client->id) }}"
                                            class="inline-flex items-center px-3 py-1.5 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 text-sm font-medium rounded-lg transition">
                                            Planning
                                        </a>

                                        <a href="{{ route('technicien.fiche_intervention_contrat', $client->id) }}"
                                            class="inline-flex items-center px-3 py-1.5 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 text-sm font-medium rounded-lg transition">
                                            Établir la fiche
                                        </a>


                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>

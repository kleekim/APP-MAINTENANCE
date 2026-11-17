<x-app-layout>
    <x-slot name="header"></x-slot>

    @php 

        $fmt = function ($m) {
            $m = (int) round($m);
            if ($m < 60) {
                return $m . ' min';
            }
            if ($m < 1440) {
                return intdiv($m, 60) . ' h ' . str_pad($m % 60, 2, '0', STR_PAD_LEFT) . ' min';
            }
            return intdiv($m, 1440) . ' j ' . intdiv($m % 1440, 60) . ' h';
        };

        $badge = fn($m) => $m <= 1440
            ? 'bg-green-100 text-green-700'
            : ($m <= 4320
                ? 'bg-amber-100 text-amber-700'
                : 'bg-red-100 text-red-700');
    @endphp

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow p-6">

            <div class="mb-6">
                <h2 class="text-xl font-bold text-gray-900">Pannes les plus fréquentes</h2>
                @if ($classement->isNotEmpty())
                    <p class="text-sm text-gray-500 mt-1">
                        {{ $total }} {{ $total > 1 ? 'demandes traitées' : 'demande traitée' }} au total
                    </p>
                @endif
            </div>

            <div class="rounded-lg border border-gray-200" style="max-height: 65vh; overflow-y: auto;">
                <table class="w-full">
                    <thead style="position: sticky; top: 0; z-index: 10;">
                        <tr style="background-color: #006937;">
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">N⁰</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Type de panne</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Nombre de pannes</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white" style="min-width: 180px;"> Part des demandes</th>    
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Délai moyen</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-white">Dernière panne signalée
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($classement as $ligne)
                            <tr class="border-t border-gray-200 hover:bg-green-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $ligne['type'] }}</td>
                                <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $ligne['total'] }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex-1 h-2 rounded-full bg-gray-100 overflow-hidden">
                                            <div class="h-2 rounded-full"
                                                style="width: {{ $ligne['part'] }}%; background: {{ $loop->first ? '#006937' : '#7bb892' }};">
                                            </div>
                                        </div>
                                        <span class="text-xs text-gray-600 w-10 text-right">{{ $ligne['part'] }}
                                            %</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <span
                                        class="px-2 py-1 text-xs font-semibold rounded-full {{ $badge($ligne['delai_moyen']) }}">
                                        {{ $fmt($ligne['delai_moyen']) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                    {{ $ligne['derniere']->format('d/m/Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-400 text-sm">
                                    Aucune demande terminée pour le moment.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>

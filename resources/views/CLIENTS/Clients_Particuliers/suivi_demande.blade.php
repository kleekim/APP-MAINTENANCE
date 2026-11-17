<x-app-layout>
    <x-slot name="header"></x-slot>

    @php
        
        $etats = [
            'attente'  => ['label' => 'En attente', 'couleur' => '#ef4444', 'fond' => '#fee2e2', 'texte' => '#b91c1c', 'etape' => 1],
            'approuve' => ['label' => 'Approuvée',  'couleur' => '#22c55e', 'fond' => '#dcfce7', 'texte' => '#15803d', 'etape' => 2],
            'en_cours' => ['label' => 'En cours',   'couleur' => '#f97316', 'fond' => '#ffedd5', 'texte' => '#c2410c', 'etape' => 3],
            'termine'  => ['label' => 'Terminée',   'couleur' => '#006937', 'fond' => '#d1fae5', 'texte' => '#006937', 'etape' => 4],
        ];

        $cle = fn ($statut) => match ($statut) {
            'approuvé', 'approuve' => 'approuve',
            'en_cours'             => 'en_cours',
            'terminé', 'termine'   => 'termine',
            default                => 'attente',
        };

        $compte = $demandes->groupBy(fn ($d) => $cle($d->statut))->map->count();
    @endphp

    <div class="container mx-auto px-4 py-8 space-y-6" style="max-width: 1000px;">
       
        <div>
            <h1 class="text-xl font-bold text-gray-900">Mes demandes</h1>
            <p class="text-sm text-gray-500 mt-1">Suivez l'état de vos demandes de maintenance</p>
        </div>

        @if ($demandes->isEmpty())
            <div class="bg-white rounded-xl border border-gray-200 py-16 px-6 text-center">
                <div class="mx-auto w-14 h-14 rounded-full flex items-center justify-center mb-4"
                    style="background:#dcfce7;">
                    <svg class="w-7 h-7" style="color:#006937;" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v14l-4-2-3 2-3-2-4 2V6a2 2 0 012-2z" />
                    </svg>
                </div>
                <p class="text-gray-900 font-semibold">Aucune demande pour le moment</p>
                <p class="text-sm text-gray-500 mt-1">Vos demandes de maintenance apparaîtront ici.</p>
            </div>
        @else
            
            <div class="bg-white rounded-xl border border-gray-200 p-4 space-y-4" style="border-top: 3px solid #006937;">

                <div class="flex flex-wrap gap-2" id="filtres">
                    <button type="button" data-filtre="tous" class="filtre-btn">
                        Toutes <span class="filtre-nb">{{ $demandes->count() }}</span>
                    </button>
                    @foreach ($etats as $k => $e)
                        <button type="button" data-filtre="{{ $k }}" class="filtre-btn">
                            {{ $e['label'] }} <span class="filtre-nb">{{ $compte[$k] ?? 0 }}</span>
                        </button>
                    @endforeach
                </div>

                <input type="text" id="recherche" placeholder="Rechercher une demande..."
                    class="w-full border border-gray-300 rounded-md px-4 py-2 text-sm"
                    onfocus="this.style.outline='none'; this.style.boxShadow='0 0 0 2px #006937'; this.style.borderColor='#006937';"
                    onblur="this.style.boxShadow=''; this.style.borderColor='#d1d5db';">
            </div>

           
            <div id="liste" class="space-y-3 pr-2" style="max-height: 60vh; overflow-y: auto; overscroll-behavior: contain;">
                @foreach ($demandes as $index => $demande)
                    @php
                        $k = $cle($demande->statut);
                        $e = $etats[$k];
                    @endphp

                    <div class="demande-carte bg-white rounded-xl border border-gray-200 p-5 transition-shadow hover:shadow-md"
                        data-statut="{{ $k }}" style="border-left: 4px solid {{ $e['couleur'] }};">

                        <div class="flex items-start gap-4">

                            <div class="flex-1 min-w-0">
                                <div class="flex flex-wrap items-start justify-between gap-2">
                                    <h3 class="text-sm font-bold text-gray-900">{{ $demande->objet }}</h3>
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full whitespace-nowrap"
                                        style="background: {{ $e['fond'] }}; color: {{ $e['texte'] }};">
                                        {{ $e['label'] }}
                                    </span>
                                </div>

                                <p class="text-sm text-gray-600 mt-1">{{ Str::limit($demande->panne, 90) }}</p>

                                <p class="text-xs text-gray-400 mt-2">
                                    Demande n° {{ $index + 1 }} · Soumise le
                                    {{ $demande->created_at->format('d/m/Y à H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

                <p id="aucun-resultat" class="hidden text-center text-sm text-gray-400 py-10">
                    Aucune demande ne correspond à votre recherche.
                </p>
            </div>
        @endif
    </div>

    <style>
        .filtre-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            font-size: 13px;
            font-weight: 500;
            color: #374151;
            background: #fff;
            border: 1px solid #d1d5db;
            border-radius: 9999px;
            transition: background .15s, color .15s, border-color .15s;
        }

        .filtre-btn:hover {
            border-color: #006937;
            color: #006937;
        }

        .filtre-btn .filtre-nb {
            font-size: 12px;
            padding: 0 8px;
            border-radius: 9999px;
            background: #f3f4f6;
            color: #374151;
        }

        .filtre-btn.actif {
            background: #006937;
            border-color: #006937;
            color: #fff;
        }

        .filtre-btn.actif .filtre-nb {
            background: rgba(255, 255, 255, .22);
            color: #fff;
        }
    </style>

    <script>
        (function () {
            const boutons = document.querySelectorAll('.filtre-btn');
            const cartes = document.querySelectorAll('.demande-carte');
            const champ = document.getElementById('recherche');
            const vide = document.getElementById('aucun-resultat');
            if (!boutons.length) return;

            let filtre = 'tous';

            function appliquer() {
                const q = (champ.value || '').toLowerCase().trim();
                let visibles = 0;
                cartes.forEach(c => {
                    const okStatut = filtre === 'tous' || c.dataset.statut === filtre;
                    const okTexte = !q || c.innerText.toLowerCase().includes(q);
                    const afficher = okStatut && okTexte;
                    c.style.display = afficher ? '' : 'none';
                    if (afficher) visibles++;
                });
                vide.classList.toggle('hidden', visibles > 0);
            }

            boutons.forEach(b => b.addEventListener('click', () => {
                filtre = b.dataset.filtre;
                boutons.forEach(x => x.classList.toggle('actif', x === b));
                appliquer();
            }));

            champ.addEventListener('input', appliquer);
            boutons[0].classList.add('actif');
        })();
    </script>
</x-app-layout>
<x-app-layout>

    <x-slot name="header">
       
    </x-slot>


    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow p-6">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Modifier Client</h1>

            @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('admin.clients.update', $client) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Nom
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-[#006937] focus:ring-2 focus:ring-[#006937] @error('nom_complet') border-red-500 @enderror"
                        type="text" id="name" name="nom_complet" value="{{ old('nom_complet', $client->nom_complet) }}" required>
                    @error('nom_complet')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="type_clients">
                        Type de client
                    </label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-[#006937] focus:ring-2 focus:ring-[#006937] @error('type_clients') border-red-500 @enderror"
                        id="type_clients" name="type_clients" required>
                        <option value="particuliers" {{ old('type_clients', $client->type_clients) == 'particuliers' ? 'selected' : '' }}>Particulier</option>
                        <option value="entreprises" {{ old('type_clients', $client->type_clients) == 'entreprises' ? 'selected' : '' }}>Entreprise</option>
                    </select>
                    @error('type_clients')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>




                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-[#006937] focus:ring-2 focus:ring-[#006937] @error('email') border-red-500 @enderror"
                        type="email" id="email" name="email" value="{{ old('email', $client->email) }}" required>
                    @error('email')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Telephone
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-[#006937] focus:ring-2 focus:ring-[#006937] @error('telephone') border-red-500 @enderror"
                        type="text" id="phone" name="telephone" value="{{ old('telephone', $client->telephone) }}" required>
                    @error('telephone')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                        Adresse
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-[#006937] focus:ring-2 focus:ring-[#006937]"
                        type="text" id="address" name="address" value="{{ old('adresse', $client->adresse) }}">
                </div>


                <div class="flex items-center justify-between">
                    <button style="background-color: #006937; color: #ffffff; font-weight: 700; padding: 10px 20px; border-radius: 8px; text-decoration: none;"
                        onmouseout="this.style.backgroundColor='#006937';">
                        Enregistrer
                    </button>
                    <a href="{{ route('admin.clients.index') }}" class="text-green-700 hover:text-green-900 font-semibold">
                        Annuler
                    </a>
                </div>


            </form>
        </div>
    </div>

</x-app-layout>
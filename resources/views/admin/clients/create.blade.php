<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow p-6">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Ajouter un Nouveau Client</h1>

            <form action="{{ route('admin.clients.store') }}" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Nom
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-[#006937] focus:ring-2 focus:ring-[#006937] @error('name') border-red-500 @enderror"
                        type="text" id="name" name="name" required>
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                        Téléphone
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-[#006937] focus:ring-2 focus:ring-[#006937]"
                        type="text" id="phone" name="phone">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-[#006937] focus:ring-2 focus:ring-[#006937] @error('email') border-red-500 @enderror"
                        type="email" id="email" name="email" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                        Adresse
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-[#006937] focus:ring-2 focus:ring-[#006937] @error('address') border-red-500 @enderror"
                        type="text" id="address" name="address" required>
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="type_clients">
                        Type de client
                    </label>

                    <select
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-[#006937] focus:ring-2 focus:ring-[#006937] @error('type_clients') border-red-500 @enderror"
                        id="type_clients" name="type_clients" required>
                        <option value="">-- Sélectionnez un type --</option>
                        <option value="Particuliers">Particulier</option>
                        <option value="Entreprises">Entreprise</option>
                    </select>

                    @error('type_clients')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Mot de passe
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-[#006937] focus:ring-2 focus:ring-[#006937] @error('password') border-red-500 @enderror"
                        type="password" id="password" name="password" required>
                    @error('password')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
                        Confirmer Mot de passe
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-[#006937] focus:ring-2 focus:ring-[#006937]"
                        type="password" id="password_confirmation" name="password_confirmation" required>
                </div>


                <div class="flex items-center justify-between">
                    <button
                        style="background-color: #006937; color: #ffffff; font-weight: 700; padding: 10px 20px; border-radius: 8px; text-decoration: none;"
                        onmouseout="this.style.backgroundColor='#006937';">
                        Enregistrer
                    </button>
                    <a href="{{ route('admin.clients.index') }}"
                        class="text-green-700 hover:text-green-900 font-semibold">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>

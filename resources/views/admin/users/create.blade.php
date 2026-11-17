<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow p-6">
            <h1 class="text-2xl font-bold text-gray-900 mb-6">Ajouter un Nouvel Utilisateur</h1>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Nom
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-[#006937] focus:ring-2 focus:ring-[#006937] @error('name') border-red-500 @enderror"
                        type="text" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-[#006937] focus:ring-2 focus:ring-[#006937] @error('email') border-red-500 @enderror"
                        type="email" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                        Téléphone
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-[#006937] focus:ring-2 focus:ring-[#006937]"
                        type="text" id="phone" name="phone" value="{{ old('phone') }}">
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

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="role">
                        Rôle
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-[#006937] focus:ring-2 focus:ring-[#006937] @error('role') border-red-500 @enderror"
                        id="role" name="role" required>
                        <option value="">-- Sélectionner un rôle --</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}" {{ old('role') === $role->name ? 'selected' : '' }}>
                                {{ ucfirst($role->name) }}
                            </option>
                        @endforeach
                    </select>
                    @error('role')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button
                        style="background-color: #006937; color: #ffffff; font-weight: 700; padding: 10px 20px; border-radius: 8px; text-decoration: none;"
                        onmouseout="this.style.backgroundColor='#006937';">
                        Enregistrer
                    </button>
                    <a href="{{ route('admin.users.index') }}"
                        class="text-green-700 hover:text-green-900 font-semibold">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>

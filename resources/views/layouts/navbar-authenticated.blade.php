<nav class="bg-white shadow-lg">
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">Maintenance App</a>
            </div>
            
            <div class="flex items-center space-x-6">
                @auth
                    <span class="text-gray-700 font-medium">{{ auth()->user()->name }}</span>
                    <!-- Profile Dropdown -->
                    <div class="relative">
                        <button onclick="toggleDropdown()" class="text-gray-700 hover:text-blue-600 font-medium flex items-center gap-1">
                            Profil 
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                        </button>
                        <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden z-50">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-100 rounded-t-lg">
                                Mon Profil
                            </a>
                            <a href="{{ route('user-password.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-100">
                                Changer le mot de passe
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-100 rounded-b-lg">
                                    Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                    <script>
                        function toggleDropdown() {
                            const dropdown = document.getElementById('profileDropdown');
                            dropdown.classList.toggle('hidden');
                        }
                        // Fermer le dropdown si on clique ailleurs
                        document.addEventListener('click', function(event) {
                            const dropdown = document.getElementById('profileDropdown');
                            const button = event.target.closest('button[onclick="toggleDropdown()"]');
                            if (!button && !dropdown.contains(event.target)) {
                                dropdown.classList.add('hidden');
                            }
                        });
                    </script>
                @endauth
            </div>
        </div>
    </div>
</nav>

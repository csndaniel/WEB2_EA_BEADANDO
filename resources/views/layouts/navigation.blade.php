<nav x-data="{ open: false }" class="bg-blue-950 border-b border-blue-800 text-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-14">
            <div class="flex items-center space-x-6">

                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                    <div class="h-8 w-8 rounded-full bg-red-600 flex items-center justify-center text-xs font-bold">
                        F1
                    </div>
                    <span class="font-semibold tracking-wide hidden sm:inline">
                        F1 Statisztika
                    </span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden sm:flex space-x-4 text-sm">

                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Főoldal
                    </x-nav-link>

                    <x-nav-link :href="route('pilotas.index')" :active="request()->routeIs('pilotas*')">
                        Pilóták
                    </x-nav-link>

                    <x-nav-link :href="route('gps.index')" :active="request()->routeIs('gps*')">
                        Nagydíjak
                    </x-nav-link>

                    <x-nav-link :href="route('eredmenyek.index')" :active="request()->routeIs('eredmenyek*')">
                        Eredmények
                    </x-nav-link>

                    <x-nav-link :href="route('kapcsolat')" :active="request()->routeIs('kapcsolat')">
                        Kapcsolat
                    </x-nav-link>

                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <x-nav-link :href="route('uzenetek.index')" :active="request()->routeIs('uzenetek*')">
                            Üzenetek
                        </x-nav-link>

                        <x-nav-link :href="route('diagram.pontok')" :active="request()->routeIs('diagram.pontok')">
                            Diagram – Pontszámok
                        </x-nav-link>
                    @endif

                </div>
            </div>

            <!-- USER SECTION (Desktop) -->
            @auth
                <div class="hidden sm:flex items-center space-x-3">

                    <!-- Name -->
                    <span class="text-gray-100 font-semibold tracking-wide">
                        {{ Auth::user()->name }}
                    </span>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="px-4 py-1 bg-red-600 hover:bg-red-500 text-white font-semibold rounded-lg text-sm shadow transition">
                            Kijelentkezés
                        </button>
                    </form>

                </div>
            @else
                <!-- Show Login / Register when not logged in -->
                <div class="hidden sm:flex items-center space-x-3">
                    <a href="{{ route('login') }}" class="text-gray-200 hover:text-white">Bejelentkezés</a>
                    <a href="{{ route('register') }}" class="text-gray-200 hover:text-white">Regisztráció</a>
                    <a href="{{ route('guest.login') }}"
                        class="px-3 py-1 bg-blue-600 hover:bg-blue-500 rounded-lg text-white text-sm font-semibold shadow">
                        Vendég mód
                    </a>
                </div>
            @endauth

            <!-- Hamburger -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open"
                    class="p-2 rounded-md text-gray-300 hover:text-white hover:bg-blue-900 focus:outline-none">
                    <svg class="h-6 w-6" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden border-t border-blue-800 bg-blue-950">

        <div class="pt-2 pb-3 space-y-1 text-sm">

            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Főoldal
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('pilotas.index')" :active="request()->routeIs('pilotas*')">
                Pilóták
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('gps.index')" :active="request()->routeIs('gps*')">
                Nagydíjak
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('eredmenyek.index')" :active="request()->routeIs('eredmenyek*')">
                Eredmények
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('kapcsolat')" :active="request()->routeIs('kapcsolat')">
                Kapcsolat
            </x-responsive-nav-link>

            @if (Auth::check() && Auth::user()->role === 'admin')
                <x-responsive-nav-link :href="route('uzenetek.index')" :active="request()->routeIs('uzenetek*')">
                    Üzenetek
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('diagram.pontok')" :active="request()->routeIs('diagram.pontok')">
                    Diagram – Pontszámok
                </x-responsive-nav-link>
            @endif

        </div>

        <!-- MOBILE USER SECTION -->
        @auth
            <div class="pt-4 pb-3 border-t border-blue-800">

                <!-- Name -->
                <div class="px-4 mb-3">
                    <div class="font-semibold text-gray-200">{{ Auth::user()->name }}</div>
                </div>

                <!-- Logout button -->
                <form method="POST" action="{{ route('logout') }}" class="px-4">
                    @csrf
                    <button
                        class="w-full px-4 py-2 bg-red-600 hover:bg-red-500 text-white rounded-lg text-sm font-semibold transition shadow">
                        Kijelentkezés
                    </button>
                </form>
            </div>
        @else
            <div class="pt-4 pb-3 border-t border-blue-800 space-y-2 px-4">
                <a href="{{ route('login') }}"
                    class="block w-full px-4 py-2 bg-slate-800 hover:bg-slate-700 rounded-lg text-gray-200 text-sm text-center">
                    Bejelentkezés
                </a>

                <a href="{{ route('register') }}"
                    class="block w-full px-4 py-2 bg-slate-800 hover:bg-slate-700 rounded-lg text-gray-200 text-sm text-center">
                    Regisztráció
                </a>

                <a href="{{ route('guest.login') }}"
                    class="block w-full px-4 py-2 bg-blue-600 hover:bg-blue-500 rounded-lg text-white text-sm text-center">
                    Vendég mód
                </a>
            </div>
        @endauth

    </div>
</nav>

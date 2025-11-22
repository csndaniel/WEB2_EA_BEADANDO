<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-slate-900">

        
        
        
        
        <!-- Login card -->
        <div class="w-full max-w-md bg-slate-900/80 border border-slate-700 shadow-xl rounded-2xl p-8">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <div class="h-14 w-14 bg-red-600 rounded-full flex items-center justify-center text-white font-bold text-xl">
                    F1
                </div>
            </div>

            <!-- Címsor -->
            <h2 class="text-center text-2xl font-bold text-gray-100 mb-6">
                Bejelentkezés
            </h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-gray-300" :status="session('status')" />

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">E-mail cím</label>
                    <input id="email" type="email" name="email" required autofocus
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 text-gray-100 px-4 py-2
                                  focus:ring-red-500 focus:border-red-500">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Jelszó</label>
                    <input id="password" type="password" name="password" required
                           class="w-full rounded-lg bg-slate-800 border border-slate-700 text-gray-100 px-4 py-2 
                                  focus:ring-red-500 focus:border-red-500">
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember"
                           class="rounded bg-slate-800 border-slate-600 text-red-600 focus:ring-red-500">
                    <label for="remember_me" class="ml-2 text-sm text-gray-300">
                        Emlékezz rám
                    </label>
                </div>

                <!-- Login button -->
                <div>
                    <button
                        class="w-full bg-red-600 hover:bg-red-500 text-white font-semibold py-2 rounded-lg shadow-md transition">
                        Bejelentkezés
                    </button>
                </div>

                <!-- Regisztráció + jelszó -->
                <div class="flex justify-between text-xs text-gray-400 mt-4">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="hover:text-gray-200">
                            Elfelejtett jelszó?
                        </a>
                    @endif

                    <a href="{{ route('register') }}" class="hover:text-gray-200">
                        Regisztráció
                    </a>
                </div>

            </form>
        </div>
    </div>
</x-guest-layout>

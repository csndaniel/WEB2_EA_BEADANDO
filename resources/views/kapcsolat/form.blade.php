<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-100">
            Kapcsolat
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto bg-slate-900/80 border border-slate-700 rounded-xl p-6 shadow-lg">
        @if(session('success'))
            <div class="mb-4 rounded-lg bg-emerald-600/10 border border-emerald-500 text-emerald-200 px-4 py-2 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <p class="text-sm text-gray-300 mb-4">
            Ha kérdésed, észrevételed van a rendszerrel vagy az F1 statisztikákkal kapcsolatban, itt tudsz üzenetet küldeni.
        </p>

        <form action="{{ route('kapcsolat.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-200 mb-1">Név</label>
                <input type="text" name="nev"
                       class="w-full bg-slate-800 border-slate-700 text-gray-100 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-200 mb-1">E-mail</label>
                <input type="email" name="email"
                       class="w-full bg-slate-800 border-slate-700 text-gray-100 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-200 mb-1">Üzenet</label>
                <textarea name="uzenet" rows="5"
                          class="w-full bg-slate-800 border-slate-700 text-gray-100 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500"
                          required></textarea>
            </div>

            <div class="flex justify-end">
                <button class="px-4 py-2 bg-red-600 text-white text-sm rounded-lg hover:bg-red-500">
                    Üzenet küldése
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

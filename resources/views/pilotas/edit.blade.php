<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-100">
            Pilóta szerkesztése
        </h2>
    </x-slot>

    <div class="max-w-lg mx-auto bg-slate-900/80 border border-slate-700 rounded-xl p-6 shadow-lg">
        <form method="POST" action="{{ route('pilotas.update', $pilota->id) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-gray-200 mb-1">Név</label>
                <input type="text" name="nev" value="{{ $pilota->nev }}"
                       class="w-full border-slate-700 bg-slate-800 text-gray-100 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-200 mb-1">Nemzet</label>
                <input type="text" name="nemzet" value="{{ $pilota->nemzet }}"
                       class="w-full border-slate-700 bg-slate-800 text-gray-100 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-200 mb-1">Születési dátum</label>
                <input type="date" name="szulido" value="{{ $pilota->szulido }}"
                       class="w-full border-slate-700 bg-slate-800 text-gray-100 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500">
            </div>

            <div class="flex items-center justify-between pt-2">
                <button class="px-4 py-2 bg-emerald-600 text-white text-sm rounded-lg hover:bg-emerald-500">
                    Frissítés
                </button>
                <a href="{{ route('pilotas.index') }}" class="text-gray-300 text-sm hover:underline">
                    Mégse
                </a>
            </div>
        </form>

        <form method="POST" action="{{ route('pilotas.destroy', $pilota->id) }}" class="mt-4">
            @csrf
            @method('DELETE')
            <button class="px-4 py-2 bg-red-700 text-white text-sm rounded-lg hover:bg-red-600"
                    onclick="return confirm('Biztos törlöd?')">
                Törlés
            </button>
        </form>
    </div>
</x-app-layout>

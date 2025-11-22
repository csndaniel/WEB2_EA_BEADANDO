<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-100">
            GP szerkesztése
        </h2>
    </x-slot>

    <div class="max-w-lg mx-auto bg-slate-900/80 border border-slate-700 rounded-xl p-6 shadow-lg">
        <form method="POST" action="{{ route('gps.update', $gp->id) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-gray-200 mb-1">Dátum</label>
                <input type="date" name="datum" value="{{ $gp->datum }}"
                       class="w-full bg-slate-800 border-slate-700 text-gray-100 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-200 mb-1">GP neve</label>
                <input type="text" name="nev" value="{{ $gp->nev }}"
                       class="w-full bg-slate-800 border-slate-700 text-gray-100 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-200 mb-1">Helyszín</label>
                <input type="text" name="helyszin" value="{{ $gp->helyszin }}"
                       class="w-full bg-slate-800 border-slate-700 text-gray-100 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500"
                       required>
            </div>

            <div class="flex items-center justify-between pt-2">
                <button class="px-4 py-2 bg-emerald-600 text-white text-sm rounded-lg hover:bg-emerald-500">
                    Frissítés
                </button>
                <a href="{{ route('gps.index') }}" class="text-gray-300 text-sm hover:underline">
                    Mégse
                </a>
            </div>
        </form>

        <form method="POST" action="{{ route('gps.destroy', $gp->id) }}" class="mt-4">
            @csrf
            @method('DELETE')
            <button class="px-4 py-2 bg-red-700 text-white text-sm rounded-lg hover:bg-red-600"
                    onclick="return confirm('Biztos törlöd?')">
                Törlés
            </button>
        </form>
    </div>
</x-app-layout>

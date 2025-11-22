<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-100">
            Új eredmény felvétele
        </h2>
    </x-slot>

    <div class="max-w-lg mx-auto bg-slate-900/80 border border-slate-700 rounded-xl p-6 shadow-lg">
        <form method="POST" action="{{ route('eredmenyek.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-200 mb-1">Pilóta</label>
                <select name="pilota_id"
                        class="w-full bg-slate-800 border-slate-700 text-gray-100 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500"
                        required>
                    @foreach($pilotas as $p)
                        <option value="{{ $p->id }}">{{ $p->nev }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-200 mb-1">GP</label>
                <select name="gp_id"
                        class="w-full bg-slate-800 border-slate-700 text-gray-100 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500"
                        required>
                    @foreach($gps as $gp)
                        <option value="{{ $gp->id }}">{{ $gp->nev }} ({{ $gp->datum }})</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-200 mb-1">Pozíció</label>
                    <input type="number" name="pozicio" min="1" max="50"
                           class="w-full bg-slate-800 border-slate-700 text-gray-100 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-200 mb-1">Pont</label>
                    <input type="number" name="pont" min="0" max="50"
                           class="w-full bg-slate-800 border-slate-700 text-gray-100 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500"
                           required>
                </div>
            </div>

            <div class="flex items-center justify-between pt-2">
                <button class="px-4 py-2 bg-red-600 text-white text-sm rounded-lg hover:bg-red-500">
                    Mentés
                </button>
                <a href="{{ route('eredmenyek.index') }}" class="text-gray-300 text-sm hover:underline">
                    Mégse
                </a>
            </div>
        </form>
    </div>
</x-app-layout>

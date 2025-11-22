<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-100">
            Eredmények listája
        </h2>
    </x-slot>

    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <p class="text-sm text-gray-300">
                Összesen {{ $eredmenyek->count() }} eredmény az adatbázisban.
            </p>
            <a href="{{ route('eredmenyek.create') }}"
               class="inline-flex items-center px-4 py-2 rounded-lg bg-red-600 text-white text-sm font-medium hover:bg-red-500">
                + Új eredmény
            </a>
        </div>

        <div class="bg-slate-900/80 border border-slate-700 rounded-xl shadow-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-700 text-sm">
                <thead class="bg-slate-900">
                    <tr>
                        <th class="px-3 py-2 text-left text-gray-200 font-semibold">GP</th>
                        <th class="px-3 py-2 text-left text-gray-200 font-semibold">Pilóta</th>
                        <th class="px-3 py-2 text-left text-gray-200 font-semibold">Pozíció</th>
                        <th class="px-3 py-2 text-left text-gray-200 font-semibold">Pont</th>
                        <th class="px-3 py-2 text-left text-gray-200 font-semibold">Műveletek</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    @foreach($eredmenyek as $e)
                        <tr class="hover:bg-slate-800/70 transition">
                            <td class="px-3 py-2">
                                {{ $e->gp->nev ?? '-' }}<br>
                                <span class="text-xs text-gray-400">{{ $e->gp->datum ?? '' }}</span>
                            </td>
                            <td class="px-3 py-2">{{ $e->pilota->nev ?? '-' }}</td>
                            <td class="px-3 py-2">{{ $e->pozicio }}</td>
                            <td class="px-3 py-2">{{ $e->pont }}</td>
                            <td class="px-3 py-2 space-x-2">
                                <a href="{{ route('eredmenyek.edit', $e->id) }}"
                                   class="text-sky-400 hover:underline text-sm">Szerkesztés</a>

                                <form method="POST" action="{{ route('eredmenyek.destroy', $e->id) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-400 hover:underline text-sm"
                                            onclick="return confirm('Biztos törlöd?')">
                                        Törlés
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($eredmenyek->count() === 0)
                        <tr>
                            <td colspan="5" class="px-4 py-3 text-center text-gray-400">
                                Nincs megjeleníthető eredmény.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

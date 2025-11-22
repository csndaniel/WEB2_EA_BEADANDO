<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-100">
            Pilóták listája
        </h2>
    </x-slot>

    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <p class="text-sm text-gray-300">
                Összesen {{ $pilotas->count() }} pilóta az adatbázisban.
            </p>
            <a href="{{ route('pilotas.create') }}"
               class="inline-flex items-center px-4 py-2 rounded-lg bg-red-600 text-white text-sm font-medium hover:bg-red-500">
                + Új pilóta
            </a>
        </div>

        <div class="bg-slate-900/80 border border-slate-700 rounded-xl shadow-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-700 text-sm">
                <thead class="bg-slate-900">
                    <tr>
                        <th class="px-4 py-2 text-left font-semibold text-gray-200">Név</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-200">Nemzet</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-200">Születési dátum</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-200">Műveletek</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    @foreach($pilotas as $p)
                        <tr class="hover:bg-slate-800/70 transition">
                            <td class="px-4 py-2">{{ $p->nev }}</td>
                            <td class="px-4 py-2">{{ $p->nemzet }}</td>
                            <td class="px-4 py-2">{{ $p->szulido }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('pilotas.edit', $p->id) }}"
                                   class="text-sky-400 hover:underline text-sm">Szerkesztés</a>

                                <form action="{{ route('pilotas.destroy', $p->id) }}"
                                      method="POST" class="inline">
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

                    @if($pilotas->count() === 0)
                        <tr>
                            <td colspan="4" class="px-4 py-3 text-center text-gray-400">
                                Nincs megjeleníthető pilóta.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

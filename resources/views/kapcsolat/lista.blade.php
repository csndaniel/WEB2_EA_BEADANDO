<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-100">
            Beérkezett üzenetek
        </h2>
    </x-slot>

    <div class="bg-slate-900/80 border border-slate-700 rounded-xl p-6 shadow-lg space-y-4">
        @if(session('success'))
            <div class="rounded-lg bg-emerald-600/10 border border-emerald-500 text-emerald-200 px-4 py-2 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full divide-y divide-slate-700 text-sm">
            <thead class="bg-slate-900">
                <tr>
                    <th class="px-3 py-2 text-left text-gray-200 font-semibold">Név</th>
                    <th class="px-3 py-2 text-left text-gray-200 font-semibold">E-mail</th>
                    <th class="px-3 py-2 text-left text-gray-200 font-semibold">Üzenet</th>
                    <th class="px-3 py-2 text-left text-gray-200 font-semibold">Dátum</th>
                    <th class="px-3 py-2 text-left text-gray-200 font-semibold">Műveletek</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
                @foreach($uzenetek as $u)
                    <tr class="hover:bg-slate-800/70 transition">
                        <td class="px-3 py-2">{{ $u->nev }}</td>
                        <td class="px-3 py-2">{{ $u->email }}</td>
                        <td class="px-3 py-2 max-w-xs">
                            <div class="text-gray-200 text-xs sm:text-sm whitespace-pre-line">
                                {{ $u->uzenet }}
                            </div>
                        </td>
                        <td class="px-3 py-2 text-xs text-gray-400">
                            {{ $u->created_at }}
                        </td>
                        <td class="px-3 py-2">
                            <form method="POST" action="{{ route('uzenetek.destroy', $u->id) }}">
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

                @if($uzenetek->count() === 0)
                    <tr>
                        <td colspan="5" class="px-4 py-3 text-center text-gray-400">
                            Még nem érkezett üzenet.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>

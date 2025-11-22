<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-100">
            Pilóták pontszámai – {{ $ev }}. szezon
        </h2>
    </x-slot>

    <div class="bg-slate-900/80 border border-slate-700 rounded-xl p-6 shadow-lg space-y-6">
        <form method="GET" action="{{ route('diagram.pontok') }}" class="flex flex-wrap items-center gap-3">
            <label class="text-sm font-semibold text-gray-200">
                Válassz szezont:
            </label>

            <select name="ev"
                    onchange="this.form.submit()"
                    class="bg-slate-800 border-slate-600 text-gray-100 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500">
                @foreach($evLista as $evElem)
                    <option value="{{ $evElem }}" {{ $evElem == $ev ? 'selected' : '' }}>
                        {{ $evElem }}
                    </option>
                @endforeach
            </select>

            <span class="text-xs text-gray-400">
                A diagram a kiválasztott évben elért összpontszámokat mutatja pilótánként.
            </span>
        </form>

        <div class="w-full overflow-x-auto">
            <canvas id="pontDiagram" class="min-w-[320px] max-w-full"></canvas>
        </div>

        @if(count($labels) === 0)
            <p class="text-sm text-gray-400">
                Ehhez az évhez még nincsenek pontadatok az adatbázisban.
            </p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('pontDiagram');

        const labels = @json($labels);
        const data = @json($points);

        if (labels.length > 0) {
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '{{ $ev }}. szezon pontszámai',
                        data: data,
                        backgroundColor: 'rgba(239, 68, 68, 0.8)',
                        borderColor: 'rgba(248, 113, 113, 1)',
                        borderWidth: 1,
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            labels: {
                                color: '#e5e7eb'
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: { color: '#e5e7eb' },
                            grid: { color: 'rgba(148, 163, 184, 0.2)' }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: { color: '#e5e7eb' },
                            grid: { color: 'rgba(148, 163, 184, 0.2)' }
                        }
                    }
                }
            });
        }
    </script>
</x-app-layout>

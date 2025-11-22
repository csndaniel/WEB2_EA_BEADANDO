<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="text-xl font-semibold text-gray-100">
            Pilóták pontszámai – <?php echo e($ev); ?>. szezon
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="bg-slate-900/80 border border-slate-700 rounded-xl p-6 shadow-lg space-y-6">
        <form method="GET" action="<?php echo e(route('diagram.pontok')); ?>" class="flex flex-wrap items-center gap-3">
            <label class="text-sm font-semibold text-gray-200">
                Válassz szezont:
            </label>

            <select name="ev"
                    onchange="this.form.submit()"
                    class="bg-slate-800 border-slate-600 text-gray-100 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500">
                <?php $__currentLoopData = $evLista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evElem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($evElem); ?>" <?php echo e($evElem == $ev ? 'selected' : ''); ?>>
                        <?php echo e($evElem); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <span class="text-xs text-gray-400">
                A diagram a kiválasztott évben elért összpontszámokat mutatja pilótánként.
            </span>
        </form>

        <div class="w-full overflow-x-auto">
            <canvas id="pontDiagram" class="min-w-[320px] max-w-full"></canvas>
        </div>

        <?php if(count($labels) === 0): ?>
            <p class="text-sm text-gray-400">
                Ehhez az évhez még nincsenek pontadatok az adatbázisban.
            </p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('pontDiagram');

        const labels = <?php echo json_encode($labels, 15, 512) ?>;
        const data = <?php echo json_encode($points, 15, 512) ?>;

        if (labels.length > 0) {
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '<?php echo e($ev); ?>. szezon pontszámai',
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\web2projekt\resources\views/diagram/pontok.blade.php ENDPATH**/ ?>
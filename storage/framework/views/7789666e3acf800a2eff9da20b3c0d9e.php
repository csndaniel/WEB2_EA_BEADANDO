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
            Nagydíjak (GP) listája
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <p class="text-sm text-gray-300">
                Összesen <?php echo e($gps->count()); ?> GP az adatbázisban.
            </p>
            <a href="<?php echo e(route('gps.create')); ?>"
               class="inline-flex items-center px-4 py-2 rounded-lg bg-red-600 text-white text-sm font-medium hover:bg-red-500">
                + Új GP
            </a>
        </div>

        <div class="bg-slate-900/80 border border-slate-700 rounded-xl shadow-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-700 text-sm">
                <thead class="bg-slate-900">
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-200 font-semibold">Dátum</th>
                        <th class="px-4 py-2 text-left text-gray-200 font-semibold">GP neve</th>
                        <th class="px-4 py-2 text-left text-gray-200 font-semibold">Helyszín</th>
                        <th class="px-4 py-2 text-left text-gray-200 font-semibold">Műveletek</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800">
                    <?php $__currentLoopData = $gps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-slate-800/70 transition">
                            <td class="px-4 py-2"><?php echo e($gp->datum); ?></td>
                            <td class="px-4 py-2"><?php echo e($gp->nev); ?></td>
                            <td class="px-4 py-2"><?php echo e($gp->helyszin); ?></td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="<?php echo e(route('gps.edit', $gp->id)); ?>"
                                   class="text-sky-400 hover:underline text-sm">Szerkesztés</a>
                                <form method="POST" action="<?php echo e(route('gps.destroy', $gp->id)); ?>" class="inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="text-red-400 hover:underline text-sm"
                                            onclick="return confirm('Biztos törlöd?')">
                                        Törlés
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if($gps->count() === 0): ?>
                        <tr><td colspan="4" class="px-4 py-3 text-center text-gray-400">
                            Nincs megjeleníthető GP.
                        </td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
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
<?php /**PATH C:\xampp\htdocs\web2projekt\resources\views/gps/index.blade.php ENDPATH**/ ?>
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
            Beérkezett üzenetek
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="bg-slate-900/80 border border-slate-700 rounded-xl p-6 shadow-lg space-y-4">
        <?php if(session('success')): ?>
            <div class="rounded-lg bg-emerald-600/10 border border-emerald-500 text-emerald-200 px-4 py-2 text-sm">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

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
                <?php $__currentLoopData = $uzenetek; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-slate-800/70 transition">
                        <td class="px-3 py-2"><?php echo e($u->nev); ?></td>
                        <td class="px-3 py-2"><?php echo e($u->email); ?></td>
                        <td class="px-3 py-2 max-w-xs">
                            <div class="text-gray-200 text-xs sm:text-sm whitespace-pre-line">
                                <?php echo e($u->uzenet); ?>

                            </div>
                        </td>
                        <td class="px-3 py-2 text-xs text-gray-400">
                            <?php echo e($u->created_at); ?>

                        </td>
                        <td class="px-3 py-2">
                            <form method="POST" action="<?php echo e(route('uzenetek.destroy', $u->id)); ?>">
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

                <?php if($uzenetek->count() === 0): ?>
                    <tr>
                        <td colspan="5" class="px-4 py-3 text-center text-gray-400">
                            Még nem érkezett üzenet.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
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
<?php /**PATH C:\xampp\htdocs\web2projekt\resources\views/kapcsolat/lista.blade.php ENDPATH**/ ?>
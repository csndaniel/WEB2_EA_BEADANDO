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
            Kapcsolat
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="max-w-xl mx-auto bg-slate-900/80 border border-slate-700 rounded-xl p-6 shadow-lg">
        <?php if(session('success')): ?>
            <div class="mb-4 rounded-lg bg-emerald-600/10 border border-emerald-500 text-emerald-200 px-4 py-2 text-sm">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <p class="text-sm text-gray-300 mb-4">
            Ha kérdésed, észrevételed van a rendszerrel vagy az F1 statisztikákkal kapcsolatban, itt tudsz üzenetet küldeni.
        </p>

        <form action="<?php echo e(route('kapcsolat.store')); ?>" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?>

            <div>
                <label class="block text-sm font-semibold text-gray-200 mb-1">Név</label>
                <input type="text" name="nev"
                       class="w-full bg-slate-800 border-slate-700 text-gray-100 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-200 mb-1">E-mail</label>
                <input type="email" name="email"
                       class="w-full bg-slate-800 border-slate-700 text-gray-100 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-200 mb-1">Üzenet</label>
                <textarea name="uzenet" rows="5"
                          class="w-full bg-slate-800 border-slate-700 text-gray-100 rounded-lg px-3 py-2 text-sm focus:ring-red-500 focus:border-red-500"
                          required></textarea>
            </div>

            <div class="flex justify-end">
                <button class="px-4 py-2 bg-red-600 text-white text-sm rounded-lg hover:bg-red-500">
                    Üzenet küldése
                </button>
            </div>
        </form>
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
<?php /**PATH C:\xampp\htdocs\web2projekt\resources\views/kapcsolat/form.blade.php ENDPATH**/ ?>
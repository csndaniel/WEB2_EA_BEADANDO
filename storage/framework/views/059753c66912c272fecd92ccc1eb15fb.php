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
        <h2 class="text-2xl font-bold text-gray-100">
            Üdvözlünk az oldalunkon!
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="space-y-10">

        <!-- Sorkizárt szöveg -->
        <div class="bg-slate-900/80 border border-slate-700 rounded-xl p-6 shadow-lg">
            <h3 class="text-xl font-semibold mb-4 text-gray-200">Bemutatkozás</h3>

            <p class="text-gray-300 text-justify leading-relaxed text-sm sm:text-base">
                Ezt a weboldalt a "Web-programozás II."" tantárgy előadás óráira készítettük.
                A témaválasztás egyszerű volt: szeretjük a technikai sportokat, különösen a Formula 1-et.
                2006 utolsó versenyhétvégéjéig visszakereshető az összes megrendezett Nagydíj, az összes pilótával, és eredményeikkel.
                Az oldalon menüsáv segítségével lehet navigálni az említett oldalak között. 
                A táblák adatai módosíthatóak a CRUD megvalósításnak köszönhetően, továbbá levelezésre is van lehetőség a "Kapcsolat oldalon"
            </p>
        </div>

        <!-- Képgaléria -->

        <h2 class="text-2xl font-bold text-gray-100">
            Kedvenc, jelenleg aktív pilótáink...
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

            <!-- 1. kép -->
            <div class="group relative bg-slate-900/80 border border-slate-700 rounded-xl shadow-lg overflow-hidden">
                <img src="/images/web_ea_kep1.jpg"
                     class="w-full h-56 object-cover transition duration-300 group-hover:opacity-40"
                     alt="verstappen">

                <!-- Hover szöveg -->
                <div class="absolute inset-0 flex items-center justify-center opacity-0 
                            group-hover:opacity-100 transition duration-300 text-center px-4">
                    <p class="text-gray-100 text-sm font-medium bg-slate-900/70 px-3 py-1 rounded-lg">
                        "Send them my regards..."
                    </p>
                </div>

                <div class="p-3 text-center text-sm text-gray-300 border-t border-slate-700">
                    Max Verstappen - 4-szeres világbajnok
                </div>
            </div>

            <!-- 2. kép -->
            <div class="group relative bg-slate-900/80 border border-slate-700 rounded-xl shadow-lg overflow-hidden">
                <img src="/images/fernando-alonso-f1.png"
                     class="w-full h-56 object-cover transition duration-300 group-hover:opacity-40"
                     alt="alonso">

                <div class="absolute inset-0 flex items-center justify-center opacity-0 
                            group-hover:opacity-100 transition duration-300 text-center px-4">
                    <p class="text-gray-100 text-sm font-medium bg-slate-900/70 px-3 py-1 rounded-lg">
                        "No more radio for the rest of the race"
                    </p>
                </div>

                <div class="p-3 text-center text-sm text-gray-300 border-t border-slate-700">
                    Fernando Alonso - 2-szeres világbajnok
                </div>
            </div>

            <!-- 3. kép -->
            <div class="group relative bg-slate-900/80 border border-slate-700 rounded-xl shadow-lg overflow-hidden">
                <img src="/images/banan_leclerc.jpg"
                     class="w-full h-56 object-cover transition duration-300 group-hover:opacity-40"
                     alt="lecrerc">

                <div class="absolute inset-0 flex items-center justify-center opacity-0 
                            group-hover:opacity-100 transition duration-300 text-center px-4">
                    <p class="text-gray-100 text-sm font-medium bg-slate-900/70 px-3 py-1 rounded-lg">
                        "Banana Leclerc"
                    </p>
                </div>

                <div class="p-3 text-center text-sm text-gray-300 border-t border-slate-700">
                    Charles Leclerc - 8-szoros futamgyőztes
                </div>
            </div>

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
<?php /**PATH C:\xampp\htdocs\web2projekt\resources\views/dashboard.blade.php ENDPATH**/ ?>
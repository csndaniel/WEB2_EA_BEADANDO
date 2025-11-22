<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>F1 - CsND-RR</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700" rel="stylesheet" />

    <!-- Tailwind -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-slate-900 text-gray-100 min-h-screen flex items-center justify-center" background="public\images\login_bg.jpeg">

    <!-- Kártya -->
    <div class="w-full max-w-md bg-slate-900/80 border border-slate-700 shadow-xl rounded-2xl p-8 text-center">

        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <div class="h-16 w-16 bg-red-600 rounded-full flex items-center justify-center text-white font-bold text-2xl">
                F1
            </div>
        </div>

        <!-- Címsor -->
        <h1 class="text-3xl font-bold mb-4">F1... 2006-ig minden</h1>

        <!-- Leírás -->
        <p class="text-sm text-gray-300 leading-relaxed mb-8">
            Az oldal eléréséhez jelentkezz be, vagy regisztrálj!
            Ha nincs profilod/nem szeretnél regisztrálni, beléphetsz vendégként.
        </p>

        <!-- Gombok -->
        <div class="space-y-3">

            <!-- Bejelentkezés -->
            <a href="<?php echo e(route('login')); ?>"
               class="block w-full bg-red-600 hover:bg-red-500 text-white font-semibold py-2 rounded-lg shadow-md transition">
                Bejelentkezés
            </a>

            <!-- Regisztráció -->
            <a href="<?php echo e(route('register')); ?>"
               class="block w-full bg-slate-800 hover:bg-slate-700 text-gray-200 font-semibold py-2 rounded-lg shadow-md transition">
                Regisztráció
            </a>

            <a href="<?php echo e(route('guest.login')); ?>" 
            class="block w-full bg-slate-800 hover:bg-slate-700 text-gray-200 font-semibold py-2 rounded-lg shadow-md transition">
                Bejelentkezés vendégként
            </a>

        </div>

    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\web2projekt\resources\views/welcome.blade.php ENDPATH**/ ?>
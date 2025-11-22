<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\Pilota;
use App\Models\Gp;
use App\Models\Eredmeny;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/guest-login', function () {
    $guest = User::where('email', 'guest@example.com')->first();

    if (!$guest) {
        // Ha valamiért hiányzik, hozzuk létre dinamukisan
        $guest = User::create([
            'name' => 'Vendég Felhasználó',
            'email' => 'guest@example.com',
            'password' => bcrypt('random_password_not_used'),
            'role' => 'user',
        ]);
    }

    Auth::login($guest);

    return redirect('/dashboard');
})->name('guest.login');

// Főoldal
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (bejelentkezés után)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// PROFILE – szükséges a navigáció miatt
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ADMIN ROUTE – csak admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');
});

// --- F1 LISTÁK ---

// Pilóták listája
// Pilóta CRUD
Route::middleware(['auth'])->resource('pilotas', \App\Http\Controllers\PilotaController::class);


// GP-k listája
Route::middleware(['auth'])->get('/gps', function () {
    $gps = Gp::all();
    return view('gps.index', compact('gps'));
})->name('gps');

// Eredmények listája
Route::middleware(['auth'])->get('/eredmenyek', function () {
    $eredmenyek = Eredmeny::with(['pilota', 'gp'])->get();
    return view('eredmenyek.index', compact('eredmenyek'));
})->name('eredmenyek');

// GP CRUD
Route::middleware(['auth'])->resource('gps', \App\Http\Controllers\GpController::class);

// Eredmények CRUD
Route::middleware(['auth'])->resource('eredmenyek', \App\Http\Controllers\EredmenyController::class);


// Kapcsolat űrlap
Route::middleware(['auth'])->get('/kapcsolat', [\App\Http\Controllers\UzenetController::class, 'create'])->name('kapcsolat');

// Üzenet mentése
Route::middleware(['auth'])->post('/kapcsolat', [\App\Http\Controllers\UzenetController::class, 'store'])->name('kapcsolat.store');

// Admin üzenetek lista
Route::middleware(['auth', 'role:admin'])->get('/uzenetek', [\App\Http\Controllers\UzenetController::class, 'index'])->name('uzenetek.index');

// Admin üzenet törlése
Route::middleware(['auth', 'role:admin'])->delete('/uzenetek/{id}', [\App\Http\Controllers\UzenetController::class, 'destroy'])->name('uzenetek.destroy');


// Diagram – pontszámok év szerint
Route::middleware(['auth', 'role:admin'])
    ->get('/diagram/pontok', [\App\Http\Controllers\DiagramController::class, 'pontok'])
    ->name('diagram.pontok');


// Breeze authentication routes (kötelező!)
require __DIR__.'/auth.php';

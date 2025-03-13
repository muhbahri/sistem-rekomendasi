<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard akan langsung menampilkan hasil rekomendasi
Route::get('/dashboard', [RekomendasiController::class, 'hitungMoora'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');// routes/web.php

Route::get('/dashboard', [FormController::class, 'index'])->middleware('auth');
Route::post('/kuisioner', [FormController::class, 'simpanJawaban'])->middleware('auth');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

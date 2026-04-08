<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\PageController;

// Rute ini hanya bisa diakses jika user sudah login
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/perawatan', [PageController::class, 'perawatan'])->name('perawatan');
    Route::get('/katalog', [App\Http\Controllers\KatalogController::class, 'index'])->name('katalog');
    Route::get('/katalog/{produk}', [App\Http\Controllers\KatalogController::class, 'show'])->name('katalog.show');
    Route::post('/katalog/{produk}/checkout', [App\Http\Controllers\KatalogController::class, 'checkout'])->name('katalog.checkout');
    
    // Checkout Routes
    Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/success/{id}', [App\Http\Controllers\CheckoutController::class, 'success'])->name('checkout.success');

    Route::get('/perpustakaan', [PageController::class, 'perpustakaan'])->name('perpustakaan');
    Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
});

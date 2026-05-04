<?php

use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("welcome");
});

Route::get("/dashboard", [App\Http\Controllers\HomeController::class, "index"])
    ->middleware(["auth", "verified"])
    ->name("dashboard");

Route::middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "edit"])->name(
        "profile.edit",
    );
    Route::patch("/profile", [ProfileController::class, "update"])->name(
        "profile.update",
    );
    Route::delete("/profile", [ProfileController::class, "destroy"])->name(
        "profile.destroy",
    );
});

require __DIR__ . "/auth.php";

// Chatbot Route (dapat diakses tanpa login di semua halaman)
Route::post("/chatbot/respond", [
    App\Http\Controllers\ChatbotController::class,
    "respond",
])->name("chatbot.respond");

// Rute ini hanya bisa diakses jika user sudah login
Route::middleware("auth")->group(function () {
    Route::prefix("edukasi")
        ->name("edukasi.")
        ->group(function () {
            Route::get("/", [EdukasiController::class, "index"])->name("index");
            Route::get("/{video}", [EdukasiController::class, "show"])->name(
                "show",
            );
        });
});

Route::middleware(["auth", "verified"])->group(function () {
    // Perawatan Routes
    Route::get("/perawatan", [
        App\Http\Controllers\PerawatanController::class,
        "index",
    ])->name("perawatan");
    Route::get("/perawatan/{tanaman}", [
        App\Http\Controllers\PerawatanController::class,
        "show",
    ])->name("perawatan.show");
    Route::get("/katalog", [
        App\Http\Controllers\KatalogController::class,
        "index",
    ])->name("katalog");
    Route::get("/katalog/{produk}", [
        App\Http\Controllers\KatalogController::class,
        "show",
    ])->name("katalog.show");

    // Checkout Routes
    Route::get("/checkout", [
        App\Http\Controllers\CheckoutController::class,
        "index",
    ])->name("checkout.index");
    Route::post("/checkout", [
        App\Http\Controllers\CheckoutController::class,
        "store",
    ])->name("checkout.store");
    Route::get("/checkout/success/{id}", [
        App\Http\Controllers\CheckoutController::class,
        "success",
    ])->name("checkout.success");

    // Keranjang & Notifikasi Routes
    Route::get("/keranjang", [
        App\Http\Controllers\KeranjangController::class,
        "index",
    ])->name("keranjang.index");
    Route::post("/keranjang/tambah/{produk}", [
        App\Http\Controllers\KeranjangController::class,
        "tambah",
    ])->name("keranjang.tambah");
    Route::patch("/keranjang/update/{keranjang}", [
        App\Http\Controllers\KeranjangController::class,
        "update",
    ])->name("keranjang.update");
    Route::delete("/keranjang/hapus/{keranjang}", [
        App\Http\Controllers\KeranjangController::class,
        "hapus",
    ])->name("keranjang.hapus");
    Route::post("/notifikasi/baca-semua", function () {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name("notifikasi.read");

    Route::get("/perpustakaan", [
        App\Http\Controllers\PerpustakaanController::class,
        "index",
    ])->name("perpustakaan");
    Route::get("/perpustakaan/{literatur}", [
        App\Http\Controllers\PerpustakaanController::class,
        "show",
    ])->name("perpustakaan.show");

    Route::view("/tentang", "tentang")->name("tentang");
});

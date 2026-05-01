<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\ItemController as ControllersItemController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::middleware(['auth', 'checklevel:admin'])->prefix('admin')->group(function () {


//     Route::resource('items', ControllersItemController::class);

// });
Route::middleware(['auth', 'checklevel:admin'])->prefix('admin')->group(function () {

    // Tambahkan ->name('dashboard') di sini
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/items', [ControllersItemController::class, 'index'])->name('items.index');

    // Route untuk menampilkan form edit
    // {item} adalah Route Model Binding yang otomatis mencari ID barang
    Route::get('/items/{item}/edit', [ControllersItemController::class, 'edit'])->name('items.edit');

    // Route untuk memproses update data (Gunakan PUT atau PATCH)
    Route::put('/items/{item}', [ControllersItemController::class, 'update'])->name('items.update');
});

Route::get('/items/create', [ControllersItemController::class, 'create'])->name('items.create');
Route::post('/items', [ControllersItemController::class, 'store'])->name('items.store');

Route::resource('categories',CategoryController::class);
require __DIR__ . '/auth.php';

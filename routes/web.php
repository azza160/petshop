<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/list-hewan', [LandingController::class, 'listHewan'])->name('landing.list-hewan');
Route::get('/hewan/detail/{id}', [LandingController::class, 'detailHewan'])->name('landing.detail-hewan');
Route::get('/list-product', [LandingController::class, 'listProduct'])->name('landing.list-product');
Route::get('/product/detail/{id}', [LandingController::class, 'detailProduct'])->name('landing.detail-product');
Route::get('/login', [LandingController::class, 'login'])->name('landing.login');
Route::post('/login', [LandingController::class, 'authenticate'])->name('login');
Route::post('/logout', [LandingController::class, 'logout'])->name('logout');


//route admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        $totalHewan = \App\Models\Animal::count();
        $totalProduct = \App\Models\Product::count();
        $totalKategoriHewan = \App\Models\Category::where('tipe', 'hewan')->count();
        $totalKategoriProduct = \App\Models\Category::where('tipe', 'produk')->count();

        return view('Admin.admin', compact('totalHewan', 'totalProduct', 'totalKategoriHewan', 'totalKategoriProduct'));
    })->name('admin');

    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::post('/admin/category', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::put('/admin/category/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/admin/category/{category}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    Route::get('/admin/hewan', [\App\Http\Controllers\AnimalController::class, 'index'])->name('admin.hewan');
    Route::post('/admin/hewan', [\App\Http\Controllers\AnimalController::class, 'store'])->name('admin.hewan.store');
    Route::put('/admin/hewan/{hewan}', [\App\Http\Controllers\AnimalController::class, 'update'])->name('admin.hewan.update');
    Route::delete('/admin/hewan/{hewan}', [\App\Http\Controllers\AnimalController::class, 'destroy'])->name('admin.hewan.destroy');
    Route::get('/admin/hewan/detail/{id}', [\App\Http\Controllers\AnimalController::class, 'show'])->name('admin.hewan.detail');

    // Produk Routes
    Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product');
    Route::post('/admin/product', [ProductController::class, 'store'])->name('admin.product.store');
    Route::put('/admin/product/{product}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::delete('/admin/product/{product}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
    Route::get('/admin/product/detail/{id}', [ProductController::class, 'show'])->name('admin.product.detail');
});


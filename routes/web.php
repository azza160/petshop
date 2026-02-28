<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('Landing.landing');
});



//route admin

Route::get('/admin', function () {
    return view('Admin.admin');
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

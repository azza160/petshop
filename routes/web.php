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

Route::get('/admin/hewan', function () {
    return view('Admin.hewan');
})->name('admin.hewan');

Route::get('/admin/hewan/detail', function () {
    return view('Admin.detail-hewan');
})->name('admin.hewan.detail');

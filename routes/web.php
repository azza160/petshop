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

<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('Landing.landing');
});



//route admin

Route::get('/admin', function () {
    return view('Admin.admin');
})->name('admin');

Route::get('/admin/category', function () {
    return view('Admin.category');
})->name('admin.category');

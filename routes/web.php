<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('Landing.landing');
});

Route::get('/admin', function () {
    return view('Admin.admin');
});



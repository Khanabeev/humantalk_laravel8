<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PageController::class, 'index'])->name('index');
Route::get('/post/{slug}', [\App\Http\Controllers\PageController::class, 'post'])->name('post');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



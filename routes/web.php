<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/catalog', [MainController::class, 'catalog'])->name('catalog');
Route::get('/credit', [MainController::class, 'credit'])->name('credit');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');
Route::get('/privacy', [MainController::class, 'privacy'])->name('privacy');

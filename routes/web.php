<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('main');
Route::get('/catalog', [PageController::class, 'catalog'])->name('catalog');
Route::get('/credit', [PageController::class, 'credit'])->name('credit');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/detail/{id}', [PageController::class, 'detail'])->name('detail');

Route::get('/xml', [\App\Http\Controllers\Controller::class, 'getCars']);

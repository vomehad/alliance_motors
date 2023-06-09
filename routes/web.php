<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/to_admin', [MainController::class, 'toAdmin'])->name('admin');

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);

    return redirect()->back();
})->name('locale');

Route::get('/welcome', function () {
    return view('welcome');
});

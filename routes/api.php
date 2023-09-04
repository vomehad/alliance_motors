<?php

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('brands', [MainController::class, 'getBrands'])->name('api.brands');
Route::get('models', [MainController::class, 'getModels'])->name('api.brands');

Route::name('car')->prefix('car')->group(function() {
    Route::get('list', [MainController::class, 'getCarList'])->name('api.car.list');
    Route::get('{id}', [MainController::class, 'getOneCar'])->name('api.car.one');
});

Route::get('persons', [MainController::class, 'getPersons'])->name('api.persons');
Route::get('vacancies', [MainController::class, 'getVacancies'])->name('api.vacancies');

Route::get('settings', [MainController::class, 'getSettings'])->name('api.settings');

<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\SettingController;
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

Route::prefix('settings')->group(function () {
    Route::get('/', [SettingController::class, 'main'])->name('api.settings.main');
    Route::get('/about', [SettingController::class, 'about'])->name('api.settings.about');
});

Route::prefix('contacts')->group(function () {
    Route::get('photo', [SettingController::class, 'contactPhotos'])->name('api.contact.photo');
});
Route::prefix('offices')->group(function () {
    Route::get('/', [MainController::class, 'getOffices'])->name('api.offices');
});

Route::get('/number/app', [MainController::class, 'getAppNumber'])->name('app.number');

Route::post('/mail/application/{id}', [MainController::class, 'sendMail'])->name('api.send');



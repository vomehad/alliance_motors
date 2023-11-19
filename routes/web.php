<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/mail/example/{id}', [MainController::class, 'exampleMail'])->name('mail.example');

<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

Route::get('/mail/example/{id}', [MailController::class, 'exampleMail'])->name('mail.example');

<?php

namespace Database\Seeders;

use App\Models\PhoneNumber;
use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    public function run(): void
    {
        if (!PhoneNumber::query()->where(['type' => 'app'])->exists()) {
            $number = new PhoneNumber();
            $number->number = '9182599393';
            $number->type = 'app';

            $number->save();
        }
    }
}

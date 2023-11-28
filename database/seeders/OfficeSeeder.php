<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Office::query()->where(['address' => 'Ростовское шоссе, 7'])->exists()) {
            $office_1 = new Office();
            $office_1->address = "Ростовское шоссе, 7";
            $office_1->tel = "+7 (861) 205 49-86";
            $office_1->geo = "2, 3";
            $office_1->email = "alliance.motors@bk.ru";
            $office_1->active = true;
            $office_1->save();
        }

        if (!Office::query()->where(['address' => 'Ростовское шоссе, 17'])->exists()) {
            $office_1 = new Office();
            $office_1->address = "Ростовское шоссе, 17";
            $office_1->tel = "+7 (861) 205 49-86";
            $office_1->geo = "33, 44";
            $office_1->email = "alliance.motors@bk.ru";
            $office_1->active = false;
            $office_1->save();
        }
    }
}

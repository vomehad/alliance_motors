<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "name" => "Нибиуллин",
                "surname" => "Константин",
                "job" => "Менеджер по продажам"
            ],
            [
                "name" => "Приреченский",
                "surname" => "Владислав",
                "job" => "Менеджер по продажам"
            ],
            [
                "name" => "Михаливченков",
                "surname" => "Константин",
                "job" => "Менеджер по продажам"
            ],
            [
                "name" => "Волобуев",
                "surname" => "Кирилл",
                "job" => "Менеджер по продажам"
            ],
            [
                "name" => "Волобуев",
                "surname" => "Кирилл",
                "job" => "Менеджер по продажам"
            ],
            [
                "name" => "Волобуев",
                "surname" => "Кирилл",
                "job" => "Менеджер по продажам"
            ],
            [
                "name" => "Волобуев",
                "surname" => "Кирилл",
                "job" => "Менеджер по продажам"
            ],
            [
                "name" => "Волобуев",
                "surname" => "Кирилл",
                "job" => "Менеджер по продажам"
            ],
            [
                "name" => "Нибиуллин",
                "surname" => "Константин",
                "job" => "Менеджер по продажам"
            ],
            [
                "name" => "Приреченский",
                "surname" => "Владислав",
                "job" => "Менеджер по продажам"
            ],
            [
                "name" => "Михаливченков",
                "surname" => "Константин",
                "job" => "Менеджер по продажам"
            ],
            [
                "name" => "Волобуев",
                "surname" => "Кирилл",
                "job" => "Менеджер по продажам"
            ],
        ];

        foreach ($data as $person) {
            $user = new Person();
            $user->name = Arr::get($person, 'name');
            $user->surname = Arr::get($person, 'surname');
            $user->job = Arr::get($person, 'job');

            $user->save();
        }

    }
}

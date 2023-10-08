<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Symfony\Component\Console\Output\ConsoleOutput;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = $this->getData();

        foreach ($data as $person) {
            $name = Arr::get($person, 'name');
            $surname = Arr::get($person, 'surname');
            $job = Arr::get($person, 'job');

            if (!Person::query()->where(['name' => $name, 'surname' => $surname])->exists()) {
                $this->addPerson($name, $surname, $job);
            }
        }
    }

    private function addPerson(string $name, string $surname, string $job): void
    {
        $user = new Person();
        $user->name = $name;
        $user->surname = $surname;
        $user->job = $job;

        if ($user->save()) {
            (new ConsoleOutput())->writeln("Сотрудник $user->name $user->surname");
        }
    }

    private function getData(): array
    {
        return [
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
    }
}

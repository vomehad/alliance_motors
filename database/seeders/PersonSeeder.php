<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Symfony\Component\Console\Output\ConsoleOutput;
use \Faker\Provider\ru_RU\Person as FakePerson;

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
            $department = Arr::get($person, 'department');

            if (!Person::query()->where(['name' => $name, 'surname' => $surname])->exists()) {
                $this->addPerson($name, $surname, $job, $department);
            }
        }
    }

    private function addPerson(string $name, string $surname, string $job, string $department): void
    {
        $user = new Person();
        $user->name = $name;
        $user->surname = $surname;
        $user->job = $job;
        $user->department = $department;

        if ($user->save()) {
            (new ConsoleOutput())->writeln("Сотрудник $user->name $user->surname");
        }
    }

    private function getData(): array
    {
        return [
            [
                "name" => "Нибиуллин",
                "surname" => FakePerson::firstNameMale(),
                "job" => "Менеджер по продажам",
                "department" => Person::SALES_DEPARTMENT,
            ],
            [
                "name" => "Приреченский",
                "surname" => FakePerson::firstNameMale(),
                "job" => "Менеджер по продажам",
                "department" => Person::SALES_DEPARTMENT,
            ],
            [
                "name" => "Михаливченков",
                "surname" => FakePerson::firstNameMale(),
                "job" => "Менеджер по продажам",
                "department" => Person::SALES_DEPARTMENT,
            ],
            [
                "name" => "Волобуев",
                "surname" => FakePerson::firstNameMale(),
                "job" => "Менеджер по продажам",
                "department" => Person::SALES_DEPARTMENT,
            ],
            [
                "name" => "Рандомный",
                "surname" => FakePerson::firstNameMale(),
                "job" => "Менеджер по продажам",
                "department" => Person::SALES_DEPARTMENT,
            ],
            [
                "name" => "Волобуев",
                "surname" => FakePerson::firstNameMale(),
                "job" => "Менеджер по продажам",
                "department" => Person::SALES_DEPARTMENT,
            ],
            [
                "name" => "Волобуев",
                "surname" => FakePerson::firstNameMale(),
                "job" => "Менеджер по продажам",
                "department" => Person::SALES_DEPARTMENT,
            ],
            [
                "name" => "Волобуева",
                "surname" => FakePerson::firstNameFemale(),
                "job" => "Менеджер по продажам",
                "department" => Person::CREDIT_DEPARTMENT,
            ],
            [
                "name" => "Нибиуллина",
                "surname" => FakePerson::firstNameFemale(),
                "job" => "Менеджер по продажам",
                "department" => Person::CREDIT_DEPARTMENT,
            ],
            [
                "name" => "Приреченская",
                "surname" => FakePerson::firstNameFemale(),
                "job" => "Менеджер по продажам",
                "department" => Person::CREDIT_DEPARTMENT,
            ],
            [
                "name" => "Михаливченкова",
                "surname" => FakePerson::firstNameFemale(),
                "job" => "Менеджер по продажам",
                "department" => Person::CREDIT_DEPARTMENT,
            ],
            [
                "name" => "Волобуева",
                "surname" => FakePerson::firstNameFemale(),
                "job" => "Менеджер по продажам",
                "department" => Person::CREDIT_DEPARTMENT,
            ],
        ];
    }
}

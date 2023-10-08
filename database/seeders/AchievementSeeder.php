<?php

namespace Database\Seeders;

use App\Models\PageAboutSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Symfony\Component\Console\Output\ConsoleOutput;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = $this->getData();

        foreach ($data as $achievement) {
            $name = Arr::get($achievement, 'name');

            if (!PageAboutSetting::query()->where(['name' => $name])->exists()) {
                $this->addAchievement($achievement);
            }
        }
    }

    private function addAchievement(array $achievement)
    {
        $name = Arr::get($achievement, 'name');
        $description = Arr::get($achievement, 'description');
        $value = Arr::get($achievement, 'value');
        $extra = Arr::get($achievement, 'extra');

        $achievement = new PageAboutSetting();
        $achievement->name = $name;
        $achievement->description = $description;
        $achievement->value = $value;
        $achievement->extra = $extra;

        if ($achievement->save()) {
            (new ConsoleOutput())->writeln("Достижение $achievement->value $achievement->description");
        }
    }

    private function getData(): array
    {
        return [
            [
                'name' => 'years',
                'description' => 'Лет на рынке',
                'value' => '23+',
                'extra' => 'Лет на рынке',
            ],
            [
                'name' => 'cars',
                'description' => 'Машин отличного качества',
                'value' => '1000+',
                'extra' => 'Машин отличного качества',
            ],
            [
                'name' => 'clients',
                'description' => 'Довольных клиентов за 2022 год',
                'value' => '2000+',
                'extra' => 'Довольных клиентов за 2022 год',
            ],
        ];
    }
}

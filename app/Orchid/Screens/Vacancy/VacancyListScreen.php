<?php


namespace App\Orchid\Screens\Vacancy;


use App\Models\Vacancy;
use App\Orchid\Layouts\Vacancy\VacancyListLayout;
use Orchid\Screen\Screen;

class VacancyListScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'vacancies' => Vacancy::query()->paginate(),
        ];
    }

    public function name(): ?string
    {
        return 'Vacancy Manager';
    }

    public function description(): ?string
    {
        return 'Vacancies';
    }

    public function layout(): iterable
    {
        return [
            VacancyListLayout::class,
        ];
    }
}

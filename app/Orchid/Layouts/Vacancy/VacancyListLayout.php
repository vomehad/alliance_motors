<?php


namespace App\Orchid\Layouts\Vacancy;


use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class VacancyListLayout extends Table
{
    protected $target = 'vacancies';

    protected function columns(): iterable
    {
        return [
            TD::make('title', 'Title'),
            TD::make('description', 'Description'),
        ];
    }
}

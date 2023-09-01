<?php


namespace App\Orchid\Screens\Vacancy;


use App\Models\Vacancy;
use App\Orchid\Layouts\Vacancy\VacancyListLayout;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Link;
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
        return 'Vacancy Management';
    }

    public function description(): ?string
    {
        return 'Vacancies';
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Add'))
                ->icon('bs.plus-circle')
                ->route('platform.vacancies.create'),
        ];
    }

    public function layout(): iterable
    {
        return [
            VacancyListLayout::class,
        ];
    }
}

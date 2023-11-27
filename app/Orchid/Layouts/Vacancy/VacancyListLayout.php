<?php


namespace App\Orchid\Layouts\Vacancy;


use App\Models\Vacancy;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class VacancyListLayout extends Table
{
    protected $target = 'vacancies';

    protected function columns(): iterable
    {
        return [
            TD::make('title', __('vacancies.list.title.title'))
                ->align(TD::ALIGN_LEFT)
                ->sort()
                ->cantHide()
                ->filter(Input::make())
            ,

            TD::make('description', __('vacancies.list.description.title'))
                ->align(TD::ALIGN_LEFT)
                ->sort()
            ,

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Vacancy $vacancy) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('vacancies.edit', $vacancy->id)
                            ->icon('bs.pencil'),

                        Button::make(__('Delete'))
                            ->icon('bs.trash3')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', ['id' => $vacancy->id]),
                    ])
                ),
        ];
    }
}

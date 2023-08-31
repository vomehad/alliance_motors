<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Person;

use App\Models\Person;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Persona;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PersonListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'persons';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('name', __('Name'))
                ->align(TD::ALIGN_LEFT)
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(fn (Person $user) => new Persona($user->presenter())),

            TD::make('job', "Должность")
                ->align(TD::ALIGN_RIGHT)
                ->sort(),

            TD::make('department', 'Отдел')
                ->align(TD::ALIGN_RIGHT)
                ->sort(),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Person $user) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('platform.persons.edit', $user->id)
                            ->icon('bs.pencil'),

                        Button::make(__('Delete'))
                            ->icon('bs.trash3')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $user->id,
                            ]),
                    ])),
        ];
    }
}

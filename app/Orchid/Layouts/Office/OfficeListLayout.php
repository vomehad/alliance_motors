<?php

namespace App\Orchid\Layouts\Office;

use App\Models\Office;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Layouts\Persona;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class OfficeListLayout extends Table
{
    protected $target = 'offices';

    protected function columns(): iterable
    {
        return [
            TD::make('tel', __('offices.list.tel.label'))
                ->align(TD::ALIGN_LEFT)
                ->cantHide()
                ->filter(Input::make())
                ->render(fn (Office $office) => new Persona($office->presenter())),

            TD::make('email', __('offices.list.email.label'))
                ->align(TD::ALIGN_CENTER)
                ->filter(Input::make())
                ->cantHide(),

            TD::make('active', __('offices.list.active.label'))
                ->sort()
                ->render(fn (Office $office) => Switcher::make()
                        ->sendTrueOrFalse()
                        ->value($office->active)
                        ->disabled(true)
                ),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Office $office) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('offices.edit', $office->id)
                            ->icon('bs.pencil'),

                        Button::make(__('Delete'))
                            ->icon('bs.trash3')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', ['id' => $office->id]),
                    ])
                ),
        ];
    }
}

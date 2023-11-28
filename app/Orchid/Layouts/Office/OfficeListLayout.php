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

                        Button::make($office->active ? __('offices.list.button.off.label') : __('offices.list.button.on.label'))
                            ->icon('bs.trash3')
                            ->confirm($office->active ? __('offices.list.button.off.confirm') : __('offices.list.button.on.confirm'))
                            ->method('active', ['id' => $office->id]),
                    ])
                ),
        ];
    }
}

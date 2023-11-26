<?php


namespace App\Orchid\Layouts\Office;


use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Layouts\Rows;

class OfficeEditLayout extends Rows
{
    protected function fields(): iterable
    {
        return [
            Input::make('office.id')->hidden(),

            Input::make('office.address')
                ->title(__('offices.form.address.title'))
                ->max(128)
                ->type('text')
                ->required()
                ->placeholder(__('offices.form.address.placeholder')),

            Input::make('office.tel')
                ->title(__('offices.form.tel.title'))
                ->required()
                ->mask('+7 (999) 999 99-99'),

            Input::make('office.geo')
                ->title('offices.form.geo.title')
                ->required()
                ->type('text'),

            Input::make('office.email')
                ->required()
                ->type('email')
                ->title('offices.form.email.title'),

            Switcher::make('office.active')
                ->title(__('offices.form.active.title'))
                ->sendTrueOrFalse()
                ->value(true),
        ];
    }
}

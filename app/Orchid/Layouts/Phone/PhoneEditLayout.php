<?php


namespace App\Orchid\Layouts\Phone;


use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Layouts\Rows;

class PhoneEditLayout extends Rows
{
    protected function fields(): iterable
    {
        return [
            Input::make('phone.id')->hidden(),

            Input::make('phone.number')
                ->title(__('phone.form.number.title'))
                ->required()
                ->mask('+7 (999) 999 99-99'),

            Switcher::make('phone.active')
        ];
    }
}

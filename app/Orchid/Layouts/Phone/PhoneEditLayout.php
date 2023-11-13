<?php


namespace App\Orchid\Layouts\Phone;


use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class PhoneEditLayout extends Rows
{
    protected function fields(): iterable
    {
        return [
            Input::make('phone.id')->hidden(),
            Input::make('phone.name')
                ->title(__('main.phone.name'))
                ->required()
                ->placeholder('Name'),
            Input::make()
        ];
    }
}

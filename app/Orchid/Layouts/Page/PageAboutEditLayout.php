<?php


namespace App\Orchid\Layouts\Page;


use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class PageAboutEditLayout extends Rows
{
    protected function fields(): iterable
    {
        return [
            Input::make('about.id')->hidden(),

//            Upload::make('person.image')
//                ->title('Picture')
//                ->maxFiles(1)
//                ->storage('persons')
//            ,

            Input::make('about.name')
                ->type('text')
                ->max(128)
                ->required()
                ->title(__('Name'))
                ->placeholder(__('Name')),

            Input::make('about.description')
                ->type('text')
                ->max(128)
                ->required()
                ->title(__('Description'))
                ->placeholder(__('Description')),

            Input::make('about.value')
                ->type('text')
                ->max(128)
                ->required()
                ->title(__('Value'))
                ->placeholder(__('Value')),

            Input::make('about.extra')
                ->type('text')
                ->max(128)
                ->required()
                ->title(__('Extra'))
                ->placeholder(__('Extra')),

            Select::make('about.type')
                ->required()
                ->title(__('Department'))
                ->options([1,2,3
                ]),
        ];
    }
}

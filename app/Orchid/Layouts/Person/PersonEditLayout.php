<?php


namespace App\Orchid\Layouts\Person;


use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class PersonEditLayout extends Rows
{
    /**
     * @inheritDoc
     */
    protected function fields(): iterable
    {
        return [
            Picture::make('picture')
                ->title('Picture')
                ->horizontal()
            ,

//            Cropper::make('person.picture')
//                ->title('Cropper')
//                ->width(500)
//                ->height(300)
//                ->horizontal()
//            ,

            Input::make('person.name')
                ->type('text')
                ->max(128)
                ->required()
                ->title(__('Name'))
                ->placeholder(__('Name')),

            Input::make('person.surname')
                ->type('text')
                ->max(128)
                ->required()
                ->title(__('Surname'))
                ->placeholder(__('Surname')),

            Input::make('person.job')
                ->type('text')
                ->max(128)
                ->required()
                ->title(__('Job'))
                ->placeholder(__('Job')),

            Select::make('person.department')
                ->required()
                ->title(__('Department'))
                ->options([1,2]),

        ];
    }
}

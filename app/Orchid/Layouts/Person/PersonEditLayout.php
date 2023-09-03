<?php


namespace App\Orchid\Layouts\Person;

use App\Models\Person;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;

class PersonEditLayout extends Rows
{
    /**
     * @inheritDoc
     */
    protected function fields(): iterable
    {
        return [
            Input::make('person.id')->hidden(),

            Upload::make('person.image')
                ->title('Picture')
                ->maxFiles(1)
                ->storage('persons')
            ,

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
                ->options([
                    Person::SALES_DEPARTMENT => Person::SALES_DEPARTMENT_NAME,
                    Person::CREDIT_DEPARTMENT => Person::CREDIT_DEPARTMENT_NAME,
                ]),

        ];
    }
}

<?php


namespace App\Orchid\Layouts\Vacancy;


use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;

class VacancyEditLayout extends Rows
{
    private array $requirements;
    private array $conditions;

    public function __construct($requirementOptions, $conditionOptions)
    {
        $this->requirements = $requirementOptions;
        $this->conditions = $conditionOptions;
    }

    /**
     * @inheritDoc
     */
    protected function fields(): iterable
    {
        return [
            Input::make('vacancy.id')->hidden(),

            Input::make('vacancy.title')
                ->type('text')
                ->max(128)
                ->required()
                ->title(__('Title'))
                ->placeholder(__('Title')),

            Input::make('vacancy.description')
                ->type('text')
                ->max(1024)
                ->required()
                ->title(__('Description'))
                ->placeholder(__('Description')),

            TextArea::make('vacancy.requirements')
                ->required()
                ->title(__('Requirements'))
            ,

//            Select::make('vacancy.requirements')
//                ->multiple()
//                ->allowAdd()
//                ->required()
//                ->options($this->requirements)
//                ->title(__('Requirements'))
//            ,

            TextArea::make('vacancy.conditions')
                ->required()
                ->title(__('Conditions'))
            ,

//            Select::make('vacancy.conditions')
//                ->multiple()
//                ->allowAdd()
//                ->required()
//                ->options($this->conditions)
//                ->title(__('Conditions'))
//            ,

            Input::make('vacancy.min')
                ->type('number')
                ->required()
                ->title(__('Min'))
                ->placeholder(__('Min')),

            Input::make('vacancy.max')
                ->type('number')
                ->required()
                ->title(__('Max'))
                ->placeholder(__('Max')),

            CheckBox::make('vacancy.active')
                ->value(true)
                ->required()
                ->title(__('Active'))
                ->sendTrueOrFalse()
            ,

        ];
    }
}

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
                ->title(__('vacancies.form.title.label'))
                ->placeholder(__('vacancies.form.title.placeholder')),

            Input::make('vacancy.description')
                ->type('text')
                ->max(1024)
                ->required()
                ->title(__('vacancies.form.description.label'))
                ->placeholder(__('vacancies.form.description.placeholder')),

            TextArea::make('vacancy.requirements')
                ->required()
                ->title(__('vacancies.form.requirements.label'))
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
                ->title(__('vacancies.form.conditions.label'))
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
                ->title(__('vacancies.form.min.label'))
                ->placeholder(__('vacancies.form.min.placeholder')),

            Input::make('vacancy.max')
                ->type('number')
                ->required()
                ->title(__('vacancies.form.max.label'))
                ->placeholder(__('vacancies.form.max.placeholder')),

            CheckBox::make('vacancy.active')
                ->value(true)
                ->required()
                ->title(__('vacancies.form.active.label'))
                ->sendTrueOrFalse()
            ,

        ];
    }
}

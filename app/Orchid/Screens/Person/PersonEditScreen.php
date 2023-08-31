<?php


namespace App\Orchid\Screens\Person;


use App\Models\Person;
use App\Orchid\Layouts\Person\PersonEditLayout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class PersonEditScreen extends Screen
{
    public $person;

    public function query(Person $person): iterable
    {
        return [
            'person' => $person,
        ];
    }

    public function name(): ?string
    {
        return "Редактируем";
    }

    public function commandBar(): iterable
    {
        return [
            Button::make(__('Save'))
                ->icon('bs.check-circle')
                ->method('save')
            ,

            Button::make(__('Remove'))
                ->icon('bs.trash3')
                ->method('remove')
//                ->canSee()
        ];
    }

    /**
     * @inheritDoc
     */
    public function layout(): iterable
    {
        return [
            PersonEditLayout::class,
        ];
    }
}

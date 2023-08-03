<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class PlatformScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Контакты';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return '';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('tel')
                    ->type('tel')
                    ->title('Телефон')
                    ->horizontal(),
                CheckBox::make('checkbox')
//                    ->title('Checkbox')
                    ->placeholder('Показать на сайте'),
            ]),
            Layout::rows([
                Input::make('tel')
                    ->type('tel')
                    ->title('Телефон')
                    ->horizontal(),
                CheckBox::make('checkbox')
//                    ->title('Checkbox')
                    ->placeholder('Показать на сайте'),
            ]),
        ];
    }
}

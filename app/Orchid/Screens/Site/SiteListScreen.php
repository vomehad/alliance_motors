<?php


namespace App\Orchid\Screens\Site;


use App\Models\Office;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class SiteListScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'offices' => Office::query()->paginate(),
        ];
    }

    public function name(): ?string
    {
        return 'Office Management';
    }

    public function description(): ?string
    {
        return 'Offices';
    }

    public function commandBar(): iterable
    {
        return [
//            Link::make("Add")->icon('bs.plus-circle')->route()
        ];
    }

    /**
     * @inheritDoc
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

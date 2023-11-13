<?php


namespace App\Orchid\Screens\Site;


use App\Models\Office;
use App\Models\PhoneNumber;
use App\Orchid\Layouts\Phone\PhoneListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class SiteListScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'offices' => Office::query()->paginate(),
            'phones' => PhoneNumber::query()->paginate(),
        ];
    }

    public function name(): ?string
    {
        return 'Телефоны на сайте';
    }

    public function description(): ?string
    {
        return 'Управление телефонами';
    }

    public function commandBar(): iterable
    {
        return [
            Link::make(__("global.add"))
                ->icon('bs.plus-circle')
                ->route('phones.create')
        ];
    }

    /**
     * @inheritDoc
     */
    public function layout(): iterable
    {
        return [
            PhoneListLayout::class,

//            Layout::rows([
//                Input::make('tel')
//                    ->type('tel')
//                    ->title('Телефон')
//                    ->horizontal(),
//                CheckBox::make('checkbox')
////                    ->title('Checkbox')
//                    ->placeholder('Показать на сайте'),
//            ]),
//            Layout::rows([
//                Input::make('tel')
//                    ->type('tel')
//                    ->title('Телефон')
//                    ->horizontal(),
//                CheckBox::make('checkbox')
////                    ->title('Checkbox')
//                    ->placeholder('Показать на сайте'),
//            ]),
        ];
    }
}

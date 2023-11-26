<?php


namespace App\Orchid\Screens\Office;


use App\Models\Office;
use App\Orchid\Layouts\Office\OfficeListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class OfficeListScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'offices' => Office::query()->paginate(),
        ];
    }

    public function name(): ?string
    {
        return __('offices.page.list.name');
    }

    public function description(): ?string
    {
        return __('offices.page.list.description');
    }

    public function commandBar(): iterable
    {
        return [
            Link::make("Add")->icon('bs.plus-circle')
                ->route('offices.create'),
        ];
    }

    /**
     * @inheritDoc
     */
    public function layout(): iterable
    {
        return [
            OfficeListLayout::class,
        ];
    }
}

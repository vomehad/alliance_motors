<?php


namespace App\Orchid\Screens\Office;


use App\Models\Office;
use App\Orchid\Layouts\Office\OfficeListLayout;
use Illuminate\Http\RedirectResponse;
use Orchid\Screen\Screen;

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

    /**
     * @inheritDoc
     */
    public function layout(): iterable
    {
        return [
            OfficeListLayout::class,
        ];
    }

    public function active(int $id): RedirectResponse
    {
        /** @var Office $office */
        $office = Office::query()->where(['id' => $id])->first();
        $office->active = !$office->active;

        $office->update();

        return redirect()->route('offices');
    }
}

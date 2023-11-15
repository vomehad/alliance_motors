<?php


namespace App\Orchid\Screens\Site;


use App\Models\PhoneNumber;
use App\Orchid\Layouts\Phone\PhoneEditLayout;
use App\Orchid\Layouts\Phone\PhoneListLayout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class SiteListScreen extends Screen
{
    public function query(): iterable
    {
        $phoneNumber = PhoneNumber::query()->where(['type' => 'app'])->first();

        return [
            'phone' => $phoneNumber,
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
            Layout::block(PhoneEditLayout::class)
                ->title(__('main.title'))
                ->description(__('main.description'))
                ->commands(Button::make(__('global.save'))
                    ->type(Color::BASIC)
                    ->icon('bs.check-circle')
                    ->method('save')
                ),
        ];
    }

    public function save(PhoneNumber $number, Request $request): RedirectResponse
    {
        $data = $request->collect('phone');

        $number->fill($data->toArray());
        $number->type = 'app';

        $number->save();

        Toast::info(__('main.phone.message.saved'));

        return redirect()->route('platform.site');
    }
}

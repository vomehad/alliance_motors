<?php


namespace App\Orchid\Screens\Page;


use App\Http\Requests\PageAboutSettingRequest;
use App\Models\Office;
use App\Models\PageAboutSetting;
use App\Orchid\Layouts\Office\OfficeEditLayout;
use App\Orchid\Layouts\Page\PageAboutEditLayout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class PageAboutEditScreen extends Screen
{
    public $about;

    public function query(Office $about): iterable
    {
        return [
            'about' => $about,
        ];
    }

    public function name(): ?string
    {
        return $this->about->exists ? "Редактируем" : "Новый";
    }

    public function commandBar(): iterable
    {
        return [
            Button::make('Save')->icon('bs.check-circle')->method('save'),
            Button::make('Remove')->icon('bs.trash3')->method('remove'),
        ];
    }

    public function layout(): iterable
    {
        return [
            PageAboutEditLayout::class,
        ];
    }

    public function save(PageAboutSetting $about, PageAboutSettingRequest $request): RedirectResponse
    {
        $data = Arr::get($request->validated(), 'about');

        $about->fill($data);
        $about->save();
        $message = Arr::get($data, 'id', false) ? 'Настройка обновлена' : 'Настройка создана';
        Toast::info($message);

        return redirect()->route('about');
    }

    public function remove(PageAboutSetting $aboutSetting): RedirectResponse
    {
        $aboutSetting->delete();

        Toast::info('Удалён');

        return redirect()->route('about');
    }
}

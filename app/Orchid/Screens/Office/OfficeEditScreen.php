<?php


namespace App\Orchid\Screens\Office;


use App\Http\Requests\OfficeRequest;
use App\Models\Office;
use App\Orchid\Layouts\Office\OfficeEditLayout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;

class OfficeEditScreen extends Screen
{
    public $office;

    public function query(Office $office): iterable
    {
        return [
            'office' => $office,
        ];
    }

    public function name(): ?string
    {
        return $this->office->exists
            ? __('offices.page.form.edit.name')
            : __('offices.page.form.new.name');
    }

    public function commandBar(): iterable
    {
        return [
            Button::make(__('offices.page.button.save'))
                ->icon('bs.check-circle')
                ->method('save'),
            Button::make(__('offices.page.button.remove'))
                ->icon('bs.trash3')
                ->method('remove'),
        ];
    }

    public function layout(): iterable
    {
        return [
            OfficeEditLayout::class,
        ];
    }

    public function save(Office $office, OfficeRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $office->fill(Arr::get($data, 'office'));
        $office->tel = preg_replace('/\D+/', '', $office->tel);
        $office->save();

        return redirect()->route('offices');
    }
}

<?php


namespace App\Orchid\Screens\Office;


use App\Models\Office;
use App\Orchid\Layouts\Office\OfficeEditLayout;
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
        return $this->office->exists ? "Редактируем" : "Новый Офис";
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
            OfficeEditLayout::class,
        ];
    }
}

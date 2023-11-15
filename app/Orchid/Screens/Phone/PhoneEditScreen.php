<?php


namespace App\Orchid\Screens\Phone;


use App\Models\PhoneNumber;
use App\Orchid\Layouts\Phone\PhoneEditLayout;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;

class PhoneEditScreen extends Screen
{
    private PhoneNumber|Model|null $phoneNumber;

    public function query(PhoneNumber $phoneNumber): iterable
    {
        return [
            'phone' => $phoneNumber,
        ];
    }

    public function name(): ?string
    {
        return $this->phoneNumber?->exists ? __('global.edit') : __('global.create');
    }

    public function commandBar(): iterable
    {
        return [
            Button::make(__('Save'))->icon('bs.check-circle')->method('save'),
            Button::make(__('Remove'))->icon('bs.trash3')->method('remove'),
        ];
    }

    public function layout(): iterable
    {
        return [
            PhoneEditLayout::class,
        ];
    }
}

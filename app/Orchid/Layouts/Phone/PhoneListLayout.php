<?php


declare(strict_types=1);

namespace App\Orchid\Layouts\Phone;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PhoneListLayout extends Table
{
    protected $target = 'phones';

    protected function columns(): iterable
    {
        return [
            TD::make('name', __('main.phone.name'))
                ->align(TD::ALIGN_LEFT)
                ->sort()
                ->cantHide()
                ->filter(Input::make())
        ];
    }
}

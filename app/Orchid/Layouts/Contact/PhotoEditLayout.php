<?php

namespace App\Orchid\Layouts\Contact;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PhotoEditLayout extends Rows
{
    /**
     * @inheritDoc
     */
    protected function fields(): iterable
    {
        return [
            Input::make('photo.id')->hidden(),

            Upload::make('photo.image')
                ->title('Picture')
                ->maxFiles(1)
                ->storage('contacts'),

        ];
    }
}

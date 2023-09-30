<?php

namespace App\Orchid\Layouts\Contact;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PhotoListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'photos';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('src', 'Картинка')
                ->align(TD::ALIGN_CENTER)
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Contact;

use App\Models\Picture;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
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
                ->width('200px')
                ->render(fn (Picture $model) => // Please use view('path')
                    "<img src='" . url('storage/contacts') . $model->src . "'
                        alt='sample' class='mw-100 d-block img-fluid rounded-1 w-100'>
                        <span class='small text-muted mt-1 mb-0'># {$model->id}</span>"
                ),

            TD::make('origin_name', 'Name'),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Picture $photo) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('photos.edit', $photo->id)
                            ->icon('bs.pencil'),

                        Button::make(__('Delete'))
                            ->icon('bs.trash3')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $photo->id,
                            ]),
                    ])),
        ];
    }
}

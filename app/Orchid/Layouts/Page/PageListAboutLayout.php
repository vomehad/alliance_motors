<?php


namespace App\Orchid\Layouts\Page;

use App\Models\PageAboutSetting;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PageListAboutLayout extends Table
{
    public $target = 'about';

    protected function columns(): iterable
    {
        return [
            TD::make('name', __('Name'))
                ->align(TD::ALIGN_LEFT)
                ->sort()
                ->cantHide()
                ->filter(Input::make()),

            TD::make('value', "Значение")
                ->align(TD::ALIGN_RIGHT)
                ->sort()
                ->cantHide(),

            TD::make('extra', 'Пояснение')
                ->align(TD::ALIGN_RIGHT)
                ->sort()
                ->cantHide()
            ,

            TD::make('active', "Показывать")
                ->align(TD::ALIGN_CENTER)
                ->cantHide()
            ,

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (PageAboutSetting $about) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('platform.persons.edit', $about->id)
                            ->icon('bs.pencil'),

                        Button::make(__('Delete'))
                            ->icon('bs.trash3')
                            ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $about->id,
                            ]),
                    ])),
        ];
    }
}

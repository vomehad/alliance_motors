<?php


namespace App\Orchid\Screens\Page;


use App\Models\PageAboutSetting;
use App\Orchid\Layouts\Page\PageListAboutLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class PageAboutListScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'about' => PageAboutSetting::query()->paginate(),
        ];
    }

    public function name(): ?string
    {
        return "Page About Setting Management";
    }

    public function commandBar(): iterable
    {
        return [
            Link::make("Add")
                ->icon('bs.plus-circle')
                ->route('about.create')
        ];
    }

    public function layout(): iterable
    {
        return [
            PageListAboutLayout::class
        ];
    }
}

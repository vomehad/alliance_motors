<?php

namespace App\Orchid\Screens\Contact;

use App\Models\Picture;
use App\Orchid\Layouts\Contact\PhotoListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class PhotoListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'photos' => Picture::query()
                ->where(['entity' => 'contact.photo'])
                ->paginate()
            ,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'PhotoListScreen';
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make("Add")
                ->icon('bs.plus-circle')
                ->route('photos.create')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return iterable
     */
    public function layout(): iterable
    {
        return [
            PhotoListLayout::class
        ];
    }

    public function remove(Request $request): void
    {
        Picture::query()->findOrFail($request->get('id'))->delete();

        Toast::info('Picture deleted');
    }
}

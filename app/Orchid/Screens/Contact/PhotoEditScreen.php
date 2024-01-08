<?php

namespace App\Orchid\Screens\Contact;

use App\Http\Requests\PhotoRequest;
use App\Models\Picture;
use App\Orchid\Layouts\Contact\PhotoEditLayout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Sight;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class PhotoEditScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @param Picture $photo
     * @return array
     */
    public function query(Picture $photo): iterable
    {
        return [
            'photo' => $photo,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Новое фото';
    }

    /**
     * The screen's action buttons.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Save'))
                ->icon('bs.check-circle')
                ->method('save')
            ,

            Button::make(__('Remove'))
                ->icon('bs.trash3')
                ->method('remove')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return iterable
     */
    public function layout(): iterable
    {
        $url = url('storage/contacts');
        $legend = Layout::legend('photo', [
            Sight::make('Pic')->render(fn (Picture $photo) => "<img src='{$url}{$photo->src}'
                        alt='sample' class='mw-100 d-block img-fluid rounded-1'>
                        <span class='small text-muted mt-1 mb-0'># {$photo->id}</span>")
        ]);
        $layout = [
            PhotoEditLayout::class
        ];

        if (false) {
            array_unshift($layout, $legend);
        }

        return $layout;
    }

    public function save(Picture $picture, PhotoRequest $request): RedirectResponse
    {
        $data = Arr::get($request->validated(), 'photo');

        $picture->origin_name = 'temp'.now();
        $picture->src = 'temp'.now();
        $picture->entity = 'contact.photo';
        $picture->entity_id = reset($data['image']);
        $picture->save();
        $picture->attachment()->sync($request->input('photo.image', []));
        $photo = $picture->attachment()->first();
        $picture->origin_name = $photo->original_name;
        $picture->src = "/{$photo->path}{$photo->name}.{$photo->extension}";

        $picture->update();

        $message = Arr::get($data, 'id') ? 'Обновлена' : 'Добавлена';
        Toast::info($message);

        return redirect()->route('contacts');
    }

    public function remove(Picture $picture): RedirectResponse
    {
        $picture->delete();

        Toast::info('Удалена');

        return redirect()->route('contacts');
    }
}

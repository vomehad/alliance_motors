<?php

namespace App\Orchid\Screens\Contact;

use App\Http\Requests\PhotoRequest;
use App\Models\Person;
use App\Models\Picture;
use App\Orchid\Layouts\Contact\PhotoEditLayout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class PhotoEditScreen extends Screen
{
    private $photo;

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
        return 'PhotoEditScreen';
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
//                ->canSee()
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
            PhotoEditLayout::class
        ];
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
        $picture->src = 'contacts/' . $photo->path . $photo->name;

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

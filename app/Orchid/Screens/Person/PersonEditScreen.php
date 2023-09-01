<?php


namespace App\Orchid\Screens\Person;


use App\Http\Requests\PersonRequest;
use App\Models\Person;
use App\Orchid\Layouts\Person\PersonEditLayout;
use Illuminate\Support\Arr;
use Orchid\Alert\Toast;
use Orchid\Attachment\File;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class PersonEditScreen extends Screen
{
    public $person;

    public function query(Person $person): iterable
    {
        return [
            'person' => $person,
        ];
    }

    public function name(): ?string
    {
        return $this->person->exists ? "Редактируем" : "Новый сотрудник";
    }

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
     * @inheritDoc
     */
    public function layout(): iterable
    {
        return [
            PersonEditLayout::class,
        ];
    }

    public function save(Person $person, PersonRequest $request)
    {
        $data = Arr::get($request->validated(), 'person');
//        $data['image_id'] = Arr::get($data, 'image_id.0');

        $person->fill($data);
        $person->save();
        $person->attachment()->syncWithoutDetaching($request->input('person.image_id', []));
        Alert::info('Сотрудник добавлен');
        $message = Arr::get($data, 'id', false) ? 'Сотрудник обновлён' : 'Сотрудник создан';
        Toast::info($message);

        return redirect()->route('platform.persons');
    }
}

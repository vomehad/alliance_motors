<?php


namespace App\Orchid\Screens\Person;


use App\Http\Requests\PersonRequest;
use App\Models\Person;
use App\Orchid\Layouts\Person\PersonEditLayout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class PersonEditScreen extends Screen
{
    public $person;

    public function query(Person $person): iterable
    {
        $person->load('attachment');
        $person->image = $person->attachment()->first()?->id;

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

    public function save(Person $person, PersonRequest $request): RedirectResponse
    {
        $data = Arr::get($request->validated(), 'person');

        $person->fill($data);
        $person->save();
        $person->attachment()->sync($request->input('person.image', []));
        $message = Arr::get($data, 'id', false) ? 'Сотрудник обновлён' : 'Сотрудник создан';
        Toast::info($message);

        return redirect()->route('platform.persons');
    }

    public function remove(Person $person): RedirectResponse
    {
        $person->delete();

        Toast::info('Удалён');

        return redirect()->route('platform.persons');
    }
}

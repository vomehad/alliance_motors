<?php


namespace App\Orchid\Screens\Vacancy;


use App\Http\Requests\PersonRequest;
use App\Http\Requests\VacancyRequest;
use App\Models\Person;
use App\Models\Vacancy;
use App\Orchid\Layouts\Person\PersonEditLayout;
use App\Orchid\Layouts\Vacancy\VacancyEditLayout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class VacancyEditScreen extends Screen
{
    public $vacancy;

    public $requirements;
    public $conditions;

    public function query(Vacancy $vacancy): iterable
    {
        $this->requirements = explode('||', $vacancy->requirements);
        $this->conditions = explode('||', $vacancy->conditions);

        return [
            'vacancy' => $vacancy,
        ];
    }

    public function name(): ?string
    {
        return $this->vacancy->exists
            ? __('vacancies.page.form.edit.name')
//            ? "Редактируем"
            : __('vacancies.page.form.new.name');
//            : "Новый сотрудник";
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
//            VacancyEditLayout::class,
            new VacancyEditLayout($this->requirements, $this->conditions),
        ];
    }

    public function save(Vacancy $vacancy, VacancyRequest $request): RedirectResponse
    {
        $data = Arr::get($request->validated(), 'vacancy');

        $vacancy->fill($data);
        $vacancy->requirements = implode('||', Arr::get($data, 'requirements'));
        $vacancy->conditions = implode('||', Arr::get($data, 'conditions'));
        $vacancy->save();
        $message = Arr::get($data, 'id', false) ? 'Вакансия обновлена' : 'Вакансия создана';
        Toast::info($message);

        return redirect()->route('vacancies');
    }

    public function remove(Vacancy $vacancy): RedirectResponse
    {
        $vacancy->delete();

        Toast::info('Удалён');

        return redirect()->route('vacancies');
    }
}

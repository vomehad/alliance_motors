<?php


namespace App\Orchid\Screens\Person;


use App\Http\Requests\PersonRequest;
use App\Models\Person;
use App\Orchid\Layouts\Person\PersonEditLayout;
use Orchid\Attachment\File;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;

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
        $data = $request->validated();
        dd($request->allFiles());
        dd($data, new File($request->file('picture')));

//        $person->title = $data['title'];
//        $post->content = $data['content'];
//
//        if ($request->hasFile('cover')) {
//            $post->cover = $request->file('cover')->store('', 'posts');
//        }
//
//        $post->save();

        return redirect()->back()->withSuccess(__('posts.created'));
    }
}

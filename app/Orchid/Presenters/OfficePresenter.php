<?php

declare(strict_types=1);

namespace App\Orchid\Presenters;

use Orchid\Screen\Contracts\Personable;
use Orchid\Support\Presenter;

class OfficePresenter extends Presenter implements Personable
{
    public function title(): string
    {
        return $this->entity->tel;
    }

    public function subTitle(): string
    {
        return $this->entity->address;
    }

    public function url(): string
    {
        return route('offices.edit', $this->entity);
    }

    public function image(): ? string
    {
        return null;
    }
}

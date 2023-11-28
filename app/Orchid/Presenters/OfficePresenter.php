<?php

declare(strict_types=1);

namespace App\Orchid\Presenters;

use Orchid\Screen\Contracts\Personable;
use Orchid\Support\Presenter;

class OfficePresenter extends Presenter implements Personable
{
    public function title(): string
    {
        return preg_replace('/7(\d{3})(\d{3})(\d{2})(\d{2})/', '+7 ($1) $2 $3-$4', $this->entity->tel);
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

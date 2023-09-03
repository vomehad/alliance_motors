<?php


namespace App\Services;


use App\Models\Person;
use App\Models\Vacancy;
use Illuminate\Support\Collection;

class SiteService
{
    public function getPersons(): Collection
    {
        return Person::query()->get();
    }

    public function getVacancies(): Collection
    {
        return Vacancy::query()->get();
    }
}

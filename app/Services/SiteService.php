<?php


namespace App\Services;


use App\Models\Person;
use App\Models\Vacancy;
use Illuminate\Support\Collection;

class SiteService
{
    public function getPersons(string $department): Collection
    {
        return Person::query()->with(['attachment'])->where(['department' => $department])->get();
    }

    public function getVacancies(): Collection
    {
        return Vacancy::query()->get();
    }

    public function getSettings()
    {

    }

    public function getAbout()
    {

    }
}

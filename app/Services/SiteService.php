<?php


namespace App\Services;


use App\Models\Office;
use App\Models\PageAboutSetting;
use App\Models\Person;
use App\Models\Picture;
use App\Models\Vacancy;
use Illuminate\Support\Collection;

class SiteService
{
    public function getPersons(string $department): Collection
    {
        return Person::query()
            ->with(['attachment'])
            ->where(['department' => $department])
            ->get();
    }

    public function getVacancies(): Collection
    {
        return Vacancy::query()->get();
    }

    public function getSettings()
    {

    }

    public function pageAbout(): Collection
    {
        return PageAboutSetting::query()->get();
    }

    public function contactPhoto(): Collection
    {
        return Picture::query()
            ->where(['entity' => 'contact.photo'])
            ->get();
    }

    public function getOffices(): Collection
    {
        return Office::query()->where(['active' => true])->get();
    }
}

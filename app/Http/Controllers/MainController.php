<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Services\CarService;
use App\Services\DictService;
use App\Services\SiteService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class MainController extends Controller
{
    private DictService $distService;
    private CarService $carService;
    private SiteService $siteService;

    public function __construct(DictService $distService, CarService $carService, SiteService $siteService)
    {
        $this->distService = $distService;
        $this->carService = $carService;
        $this->siteService = $siteService;
    }

    public function getBrands(): Collection
    {
        return $this->distService->getBrandList();
    }

    public function getModels(Request $request): Collection
    {
        return $this->distService->getModelsByBrands($request->query->get('brands'));
    }

    public function getCarList(Request $request): LengthAwarePaginator
    {
        return $this->carService->getAll($request->query->all());
    }

    public function getOneCar(int $id): Car
    {
        return $this->carService->getOneById($id);
    }

    public function getPersons(): Collection
    {
        return $this->siteService->getPersons();
    }

    public function getVacancies(): Collection
    {
        return $this->siteService->getVacancies();
    }
}

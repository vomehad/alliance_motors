<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonCollection;
use App\Models\Car;
use App\Services\CarService;
use App\Services\DictService;
use App\Services\SiteService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

    public function getPersons(Request $request): JsonResponse
    {
        $persons = $this->siteService->getPersons($request->query->get('department'));

        return (new PersonCollection($persons))->response()->setStatusCode(Response::HTTP_OK);
    }

    public function getVacancies(): Collection
    {
        return $this->siteService->getVacancies();
    }

    public function getSettings()
    {
        return $this->siteService->getSettings();
    }

    public function pageAbout()
    {
        $this->siteService->getAbout();
    }
}

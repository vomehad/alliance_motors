<?php

namespace App\Http\Controllers;

use App\Http\Resources\OfficeCollection;
use App\Http\Resources\PersonCollection;
use App\Models\Car;
use App\Models\PhoneNumber;
use App\Services\CarService;
use App\Services\DictService;
use App\Services\SiteService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    public function __construct(
        private DictService $distService,
        private CarService $carService,
        private SiteService $siteService,
    ) {}

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

    public function getOffices(): JsonResponse
    {
        $offices = $this->siteService->getOffices();
        $resource = new OfficeCollection($offices);

        return $resource->response()->setStatusCode(Response::HTTP_OK);
    }

    public function getAppNumber(): PhoneNumber|Model
    {
        return PhoneNumber::query()->where(['type' => 'app'])->first();
    }
}

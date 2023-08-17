<?php

namespace App\Http\Controllers;

use App\Services\CarService;
use App\Services\DictService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class MainController extends Controller
{
    private DictService $distService;
    private CarService $carService;

    public function __construct(DictService $distService, CarService $carService)
    {
        $this->distService = $distService;
        $this->carService = $carService;
    }

    public function getBrands(): Collection
    {
        return $this->distService->getBrandList();
    }

    public function getModels(Request $request): Collection
    {
        return $this->distService->getModelsByBrands($request->query->get('brands'));
    }

    public function getCarList()
    {
        return $this->carService->getAll();
    }

    public function getOneCar(int $id)
    {
        return $this->carService->getOneById($id);
    }
}

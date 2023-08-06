<?php

namespace App\Http\Controllers;

use App\Services\CarService;
use App\Services\DictService;
use App\Services\ExpertService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Throwable;

class MainController extends Controller
{
    private ExpertService $expertService;

    private DictService $dictService;

    private CarService $carService;

    public function __construct(ExpertService $expertService, DictService $dictService, CarService $carService)
    {
        $this->expertService = $expertService;
        $this->dictService = $dictService;
        $this->carService = $carService;
    }

    public function index(): View|Factory|Application
    {
        return view('index');
    }

    public function catalog(): View|Factory|Application
    {
        return view('catalog');
    }

    public function credit(): View|Factory|Application
    {
        return view('credit');
    }

    public function about(): View|Factory|Application
    {
        return view('about');
    }

    public function contacts(): View|Factory|Application
    {
        return view('contacts');
    }

    public function privacy(): View|Factory|Application
    {
        return view('privacy');
    }

    public function xml()
    {
        $autos = $this->expertService->getAutos();

        try {
            foreach ($autos as $key => $auto) {
                dump($auto['name']);
                $expertDto = $this->expertService->parseSource($auto);

                $brand = $this->dictService->createBrand($expertDto);
                $model = $this->dictService->createModel($expertDto, $brand);
                $generation = $this->dictService->createGeneration($expertDto, $model);
                $configuration = $this->dictService->createConfiguration($expertDto, $generation);
                $kppType = $this->dictService->createKppType($expertDto);
                $carBody = $this->dictService->createCarBody($expertDto);
                $carColor = $this->dictService->createCarColor($expertDto);
                $currency = $this->dictService->createCurrency($expertDto);

                $carDto = $this->carService->parseSource($auto);
                $car = $this->carService->getCar($expertDto->expertId);

                $carDto->model = $model;
                $carDto->generation = $generation;
                $carDto->kppType = $kppType;
                $carDto->carColor = $carColor;
                $carDto->carBody = $carBody;
                $carDto->currency = $currency;

                if ($car) {
                    $car = $this->carService->updateCar($carDto, $car);
                } else {
                    $car = $this->carService->createCar($carDto, $expertDto);
                }

                $this->carService->addPictures(Arr::get($auto, 'picture'), $car);

                dump("Обновлено $car->name");
            }
        } catch (Throwable $ex) {
            dump($auto['name']);
            dd($ex->getMessage(), $ex->getTraceAsString());
        }
        dd('Обновление окончено');
        dd($result->shop->offers->offer);
    }
}

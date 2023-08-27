<?php

namespace App\Http\Controllers;

use App\Dto\CarDto;
use App\Services\CarService;
use App\Services\DictService;
use App\Services\ExpertService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Arr;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getCars()
    {
        $service = new ExpertService();
        $autos = $service->getAutoStock();

        foreach ($autos as $auto) {
            dd($auto);
        }
    }

    public function getXml()
    {
        $service = new ExpertService();
        $dictService = new DictService();
        $carService = new CarService();

        $data = $service->getAutoStock();

        foreach ($data as $auto) {
            $expertDto = $service->parseStock($auto);

            $brand = $dictService->createBrand($expertDto);
            $model = $dictService->createModel($expertDto, $brand);
            $configuration = $dictService->createConfiguration($expertDto, $model);
            $engine = $dictService->createEngine($expertDto, $configuration);
            $kppType = $dictService->createKppType($expertDto);
            $carBody = $dictService->createCarBody($expertDto);
            $carColor = $dictService->createCarColor($expertDto);
            $currency = $dictService->createCurrency($expertDto);

            $carDto = $carService->parseSource($auto);
            $car = $carService->getCar($expertDto->expertId);

            $carDto->configuration_id = $configuration->id;
            $carDto->currency_id = $currency->id;
            $carDto->car_color_id = $carColor->id;
            $carDto->car_body_id = $carBody->id;
            $carDto->kpp_id = $kppType->id;

            if ($car) {
                $car = $carService->updateCar($carDto, $car);
            } else {
                $car = $carService->createCar($carDto, $expertDto);
            }

            $carService->addPictures(Arr::get($auto, 'images.image'), $car);
        }
    }
}

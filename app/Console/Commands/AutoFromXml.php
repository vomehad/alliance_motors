<?php

namespace App\Console\Commands;

use App\Services\CarService;
use App\Services\DictService;
use App\Services\ExpertService;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Throwable;

class AutoFromXml extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:xml';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновление информации о авто';

    private ExpertService $expertService;

    private DictService $dictService;

    private CarService $carService;

    public function __construct(ExpertService $expertService, DictService $dictService, CarService $carService)
    {
        $this->expertService = $expertService;
        $this->dictService = $dictService;
        $this->carService = $carService;

        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
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

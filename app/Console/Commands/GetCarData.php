<?php

namespace App\Console\Commands;

use App\Services\CarService;
use App\Services\DictService;
use App\Services\ExpertService;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class GetCarData extends Command
{
    private ExpertService $expertService;
    private DictService $dictService;
    private CarService $cartService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-car-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновить авто';

    public function __construct(ExpertService $expertService, DictService $dictService, CarService $cartService)
    {
        parent::__construct();
        $this->expertService = $expertService;
        $this->dictService = $dictService;
        $this->cartService = $cartService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = $this->expertService->getAutoStock();

        foreach ($data as $auto) {
            $expertDto = $this->expertService->parseStock($auto);

            $brand = $this->dictService->createBrand($expertDto);
            $model = $this->dictService->createModel($expertDto, $brand);
            $configuration = $this->dictService->createConfiguration($expertDto, $model);
            $engine = $this->dictService->createEngine($expertDto, $configuration);
            $kppType = $this->dictService->createKppType($expertDto);
            $carBody = $this->dictService->createCarBody($expertDto);
            $carColor = $this->dictService->createCarColor($expertDto);
            $currency = $this->dictService->createCurrency($expertDto);

            $carDto = $this->cartService->parseSource($auto);
            $car = $this->cartService->getCar($expertDto->expertId);

            $carDto->configuration_id = $configuration->id;
            $carDto->currency_id = $currency->id;
            $carDto->car_color_id = $carColor->id;
            $carDto->car_body_id = $carBody->id;
            $carDto->kpp_id = $kppType->id;

            if ($car) {
                $car = $this->cartService->updateCar($carDto, $car);
            } else {
                $car = $this->cartService->createCar($carDto, $expertDto);
            }

            $this->cartService->addPictures(Arr::get($auto, 'images.image'), $car);
        }
    }
}

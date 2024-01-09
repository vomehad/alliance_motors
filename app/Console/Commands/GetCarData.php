<?php

namespace App\Console\Commands;

use App\Services\CarService;
use App\Services\DictService;
use App\Services\ExpertService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Output\ConsoleOutput;
use Throwable;

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
        $out = new ConsoleOutput();

        try {
            $data = $this->expertService->getAutoStock();

            $startTime = Carbon::now();
            $out->writeln("$startTime - begin");
            foreach ($data as $key => $auto) {
                if (!Arr::get($auto, 'mark_id')) {
                    Log::channel('cm_expert')->warning(Arr::get($auto, 'unique_id') . ' - не заполнено mark_id');
                    $out->writeln($key . " | " . $auto['unique_id']);
                    continue;
                }
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
                    Log::channel('cm_expert')->info($car->expert_id . ' - авто обновлено');
                    $out->writeln($key . " | " . $car->presenter()->title() . ' - авто обновлено');
                } else {
                    $car = $this->cartService->createCar($carDto, $expertDto);
                    Log::channel('cm_expert')->info($car->expert_id . ' - авто добавлено');
                    $out->writeln($key . " | " . $car->presenter()->title() . ' - авто добавлено');
                }

                $this->cartService->addPictures(Arr::get($auto, 'images.image'), $car);
            }
        } catch (Throwable $ex) {
            (new ConsoleOutput())->writeln($ex->getMessage());
            throw new \ErrorException();
        }

        $out->writeln(Carbon::now() . " end");

        $out->writeln($startTime);
        $out->writeln((Carbon::now())->diffInSeconds($startTime) . " s");
    }
}

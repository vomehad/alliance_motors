<?php


namespace App\Services;


use App\Dto\CarDto;
use App\Dto\ExpertDto;
use App\Models\Car;
use App\Models\Picture;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Arr;

class CarService
{
    public function getCar(string $expertId): ?EloquentModel
    {
        return Car::query()->where(['expert_id' => $expertId])->first();
    }

    public function createCar(CarDto $dto, ExpertDto $expertDto): Car
    {
        $car = new Car();

        $car->fill(array_merge($dto->toArray(), ['expert_id' => $expertDto->expertId]));

        $car->save();

        return $car;
    }

    public function updateCar(CarDto $dto, EloquentModel $car): Car|EloquentModel
    {
        $car->fill($dto->toArray());

        $car->update();

        return $car;
    }

    public function parseSource(array $source): CarDto
    {
        $params = Arr::get($source, 'param');
//        dd(Arr::get($params, 3), $params, $source);

        $dto = new CarDto();

        $dto->name = Arr::get($source, 'name');
        $dto->count = Arr::get($source, 'count');
        $dto->price = Arr::get($source, 'price');
        $dto->pickup = Arr::get($source, 'pickup');
        $dto->store = Arr::get($source, 'store');
        $dto->description = Arr::get($source, 'description');
        $dto->url = Arr::get($source, 'url');
        $dto->vehicle_mileage = Arr::get($params, 0);
        $dto->year = Arr::get($params, 1);
        $dto->steering_wheel = Arr::get($params, 3);
        $dto->pts = isset($params[11]) ? $params[5] : null;
        $dto->pts_owners = isset($params[11]) ? $params[6] : $params[5];
        $dto->engine = isset($params[11]) ? $params[7] : $params[6];
        $dto->wheel_drive = isset($params[11]) ? $params[8] : $params[7];
//        dd($dto);

        return $dto;
    }

    public function addPictures(array $pictures, Car $car)
    {
        foreach ($pictures as $img) {
            $picture = Picture::firstOrCreate([
                'origin_name' => $img,
                'src' => $img,
                'entity' => Car::class,
                'entity_id' => $car->id,
            ]);
        }
    }
}

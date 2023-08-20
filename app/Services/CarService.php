<?php


namespace App\Services;


use App\Dto\CarDto;
use App\Dto\ExpertDto;
use App\Models\Car;
use App\Models\Picture;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Arr;

class CarService
{
    public function getAll(array $params): LengthAwarePaginator
    {
        $relations = [
            'pictures',
            'kpp',
            'body',
            'currency',
            'color',
            'generation',
            'model.brand',
        ];

        $query = Car::query()->with($relations);

        if (Arr::get($params, 'brand')) {
            $brands = explode(',', Arr::get($params, 'brand'));
            $query->whereHas('model', function (Builder $q) use ($brands) {
                return $q->whereIn('brand_id', $brands);
            });
        }

        if (Arr::get($params, 'model')) {
            $models = explode(',', Arr::get($params, 'model'));
            $query->whereIn('model_id', $models);
        }

        if (Arr::get($params, 'year')) {
            [$from, $to] = explode(',', Arr::get($params, 'year'));
            if ($from) {
                $query->where('year', '>=', $from);
            }
            if ($to) {
                $query->where('year', '<=', $to);
            }
        }

        if (Arr::get($params, 'price')) {
            [$from, $to] = explode(',', Arr::get($params, 'price'));
            if ($from) {
                $query->where('price', '>=', $from);
            }
            if ($to) {
                $query->where('price', '<=', $to);
            }
        }

        if (Arr::get($params, 'mileage')) {
            [$from, $to] = explode(',', Arr::get($params, 'mileage'));
            if ($from) {
                $query->where('vehicle_mileage', '>=', $from);
            }
            if ($to) {
                $query->where('vehicle_mileage', '<=', $to);
            }
        }

        if (Arr::get($params, 'wheel_drive')) {
            $drive = Arr::get($params, 'wheel_drive');
            $query->where('wheel_drive', $drive);
        }

        if (Arr::get($params, 'kpp')) {
            $kppType = Arr::get($params, 'kpp');
            $query->where('kpp', $kppType);
        }

        if (Arr::get($params, 'fuel')) {
            $fuel = Arr::get($params, 'fuel');
            $query->where('fuel', $fuel);
        }

        return $query->paginate();
    }

    public function getOneById(int $id): Car|EloquentModel
    {
        $relations = [
            'pictures',
            'kpp',
            'body',
            'currency',
            'color',
            'generation',
            'model.brand',
        ];

        return Car::query()->with($relations)->where(['id' => $id])->first();
    }

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
